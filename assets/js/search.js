const searchBar = document.querySelector('.liste-clients__searchbar');

searchBar.addEventListener("input", searchFilter);

function searchFilter() {
  const users = document.querySelectorAll('.liste-clients__liste__item');

  if (searchBar.value != "") {
    for (let user of users) {
      let title = user.querySelector('.liste-clients__liste__item-nom').textContent.toLocaleLowerCase();
      let filterValue = searchBar.value.toLocaleLowerCase();
      if (!title.includes(filterValue)) {
        user.style.display = "none";
      } else {
        user.style.display = "flex";
      }
    }
  } else {
    for (let user of users) {
      user.style.display = "flex";
    }
  }
}