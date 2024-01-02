import axios from "axios";

let loadmoreTags = document.querySelector("#loadmore-tags"),
loadmoreBtnTags = document.querySelector(".btn-loadmore-tags"),
wrapPostTags = document.querySelector(".wrap-posts");

const loadmoreTag = (e) => {
  e.preventDefault();

  let url = loadmore_params.ajaxurl,
  data = new FormData(),
  max_page_posts = e.target.attributes.total.value,
  tags = e.target.attributes.tags.value;

  data.append("action", "loadmore_tags");
  data.append("query", loadmore_params.posts);
  data.append("page", loadmore_params.current_page);
  data.append("tag", tags);

  loadmoreTags.classList.add("loading");
  loadmoreBtnTags.value = 'Carregando ...';

  axios
  .post(url, data)
  .then(function (response) {
    loadmore_params.current_page++;
    if (loadmore_params.current_page == max_page_posts) loadmoreTags.remove();
    wrapPostTags.insertAdjacentHTML("beforeend", response.data);
    loadmoreTags.classList.remove("loading");
    loadmoreBtnTags.value = 'Carregar Mais Notícias';
  })
  .catch(function (error) {
    console.log(error);
    loadmoreTags.classList.remove("loading");
    loadmoreBtnTags.value = 'Carregar Mais Notícias';
  });

};

if (loadmoreTags) loadmoreBtnTags.addEventListener("click", loadmoreTag);
