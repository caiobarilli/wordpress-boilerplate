import "lazyload";

let postThumbnail = document.querySelectorAll(".thumbnail-post-cover");
let searchThumbnail = document.querySelectorAll(".search-post-cover");
let stickyThumbnail = document.querySelectorAll(".sticky-post-cover");

lazyload(stickyThumbnail);
lazyload(postThumbnail);
lazyload(searchThumbnail);