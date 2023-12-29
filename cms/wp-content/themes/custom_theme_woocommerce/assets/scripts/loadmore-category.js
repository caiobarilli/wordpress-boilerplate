import axios from "axios";

let loadmoreCategory = document.querySelector("#loadmore-category"),
  loadmoreBtnCategory = document.querySelector(".btn-loadmore-category"),
  wrapPostCategory = document.querySelector(".wrap-posts");

const loadmorePostCategory = (e) => {
  e.preventDefault();

  let url = loadmore_category_params.ajaxurl,
  data = new FormData(),
  max_page_posts = e.target.attributes.total.value,
  category = e.target.attributes.category.value;

  data.append("action",   "loadmore_category");
  data.append("query",    loadmore_category_params.posts);
  data.append("page",     loadmore_category_params.current_page);
  data.append("category", category);

  loadmoreCategory.classList.add("loading");
  loadmoreBtnCategory.value = 'Carregando ...';

  axios
  .post(url, data)
  .then(function (response) {
    loadmore_category_params.current_page++;
    if (loadmore_category_params.current_page == max_page_posts) loadmoreCategory.remove();
    wrapPostCategory.insertAdjacentHTML("beforeend", response.data);
    loadmoreCategory.classList.remove("loading");
    loadmoreBtnCategory.value = 'Carregar Mais Notícias';
  })
  .catch(function (error) {
    console.log(error);
    loadmoreCategory.classList.remove("loading");
    loadmoreBtnCategory.value = 'Carregar Mais Notícias';
  });

};

if (loadmoreCategory) loadmoreBtnCategory.addEventListener("click", loadmorePostCategory);
