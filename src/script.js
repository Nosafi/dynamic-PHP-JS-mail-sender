function on_img_click(cl) {
  switch (cl) {
    case "first":
      img1 = "/assets/img/open_book.png";
      img2 = "/assets/img/close_book.png";
      break;
    case "second":
      img1 = "/assets/img/open_book.png";
      img2 = "/assets/img/close_book.png";
      break;
    case "third":
      img1 = "/assets/img/open_book.png";
      img2 = "/assets/img/close_book.png";
      break;
    default:
      break;
  }

  let target = document.querySelector("." + cl + "_book");
  let target_ch = document.querySelector("." + cl + "_book_check");

  if (target.getAttribute("data-switch") == "false") {
    target.setAttribute("src", img1);
    target.setAttribute("data-switch", "true");
    target_ch.checked = true;
  } else {
    target.setAttribute("src", img2);
    target.setAttribute("data-switch", "false");
    target_ch.checked = false;
  }
}
