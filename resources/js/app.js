const article = document.querySelector("main article");
let articleContent = false;
let isAdminPage = false;

if (article) {
  articleContent = article.querySelector(".content");
}

// Check if we are on the edit page
if (
    document.body.classList.contains("posts-create") ||
    document.body.classList.contains("posts-edit")
) {
    // posts-create
    isAdminPage = true;
    articleContent = document.querySelector("textarea#post_content");
}


if (articleContent) {
  const showdown  = require("showdown");
  const converter = new showdown.Converter();
  let articleTitle;
  let articlePreview;
  let articlePreviewTitle;

  if (isAdminPage) {
    articleTitle = document.querySelector("#post_title");
    articlePreview = document.querySelector("#post_content-preview");
    articlePreviewTitle = article.querySelector(".title");

    // Render markdown as HTML
    articleTitle.addEventListener("keyup", adminPreviewRender);
    articleContent.addEventListener("keyup", adminPreviewRender);
    adminPreviewRender();
  } else if (document.body.classList.contains("posts-show")) {
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
