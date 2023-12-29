import axios from "axios";

let loadmoreForm = document.querySelector("#loadmore"),
    loadmoreBtn = document.querySelector(".btn-loadmore"),
    features = document.querySelector(".wrap-posts");

const loadmore = (e) => {
  e.preventDefault();

  let url = loadmore_params.ajaxurl,
  data = new FormData(),
  max_page_posts = e.target.attributes.total.value;

  data.append("action", "loadmore");
  data.append("query", loadmore_params.posts);
  data.append("page", loadmore_params.current_page);

  loadmoreForm.classList.add("loading");
  loadmoreBtn.value = 'Carregando ...';

  axios
  .post(url, data)
  .then(function (response) {
    loadmore_params.current_page++;
    if (loadmore_params.current_page == max_page_posts) loadmoreForm.remove();
    features.insertAdjacentHTML("beforeend", response.data);
    loadmoreForm.classList.remove("loading");
    loadmoreBtn.value = 'Carregar Mais Notícias';
  })
  .catch(function (error) {
    console.log(error);
    loadmoreForm.classList.remove("loading");
    loadmoreBtn.value = 'Carregar Mais Notícias';
  });

};

if (loadmoreForm) loadmoreBtn.addEventListener("click", loadmore);
