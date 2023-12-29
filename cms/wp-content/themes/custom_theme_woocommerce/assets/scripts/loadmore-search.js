import axios from "axios";

let loadmoreSearchForm = document.querySelector("#loadmore-search"),
  loadmoreBtnSearch = document.querySelector(".btn-loadmore-search"),
  wrapPostSearch = document.querySelector(".wrap-posts");

const loadmore = (e) => {
  e.preventDefault();

  let url = loadmore_search_params.ajaxurl,
  data = new FormData(),
  max_page_posts = e.target.attributes.total.value,
  s_query = e.target.attributes.s.value,
  order = e.target.attributes.order.value;

  data.append("action", "loadmore_search");
  data.append("query", loadmore_search_params.posts);
  data.append("page", loadmore_search_params.current_page);
  data.append("s_query", s_query);
  data.append("order", order);

  loadmoreSearchForm.classList.add("loading");
  loadmoreBtnSearch.value = 'Carregando ...';

  axios
  .post(url, data)
  .then(function (response) {
    loadmore_search_params.current_page++;
    if (loadmore_search_params.current_page == max_page_posts) loadmoreSearchForm.remove();
    wrapPostSearch.insertAdjacentHTML("beforeend", response.data);
    loadmoreSearchForm.classList.remove("loading");
    loadmoreBtnSearch.value = 'Carregar Mais Notícias';
  })
  .catch(function (error) {
    console.log(error);
    loadmoreSearchForm.classList.remove("loading");
    loadmoreBtnSearch.value = 'Carregar Mais Notícias';
  });

};

if (loadmoreSearchForm) loadmoreBtnSearch.addEventListener("click", loadmore);
