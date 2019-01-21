const articles = document.querySelectorAll("article");
let articleContent = false;
let isAdminPage = false;
let isPostPage = false;

// Check if we are on an admin post page
if (
  document.body.classList.contains("posts-create") ||
  document.body.classList.contains("posts-edit")
) {
  // posts-create
  isAdminPage = true;
}

// Check if we are on a regular post page
if (
  document.body.classList.contains("posts-index") ||
  document.body.classList.contains("posts-show")
) {
  // posts-create
  isPostPage = true;
}

for (let i = 0; i < articles.length; i++) {
  let article = articles[i];
  articleContent = article.querySelector(".content");

  if (articleContent) {
    const showdown  = require("showdown");
    const converter = new showdown.Converter();
    let articleTitle;
    let articlePreview;
    let articlePreviewTitle;

    if (isAdminPage) {
      articleTitle = document.querySelector("#post_title");
      articleContent = document.querySelector("textarea#post_content");
      articlePreview = document.querySelector("#post_content-preview");
      articlePreviewTitle = article.querySelector(".title");

      // Render markdown as HTML
      articleTitle.addEventListener("keyup", adminPreviewRender);
      articleContent.addEventListener("keyup", adminPreviewRender);
      adminPreviewRender();
    } else if (isPostPage) {
      // Render markdown as HTML
      articleContent.innerHTML = converter.makeHtml(articleContent.innerHTML);

      // Remove image if it's just the placeholder
      let articleImg = article.querySelector("img:first-child");
      if (articleImg && articleImg.getAttribute("src") == "/storage/placeholder-wide.png") {
        article.removeChild(articleImg);
      }
    }

    function adminPreviewRender() {
      articlePreview.innerHTML = converter.makeHtml(articleContent.value);
      articlePreviewTitle.innerHTML = articleTitle.value;
    }
  }
}
