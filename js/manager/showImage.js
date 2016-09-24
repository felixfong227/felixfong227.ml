let bottom = document.querySelector(".bottom");
let loadIcon = document.querySelector(".loadIcon");
let time = 5;
let allowNewRequest = true;
window.addEventListener("scroll", function () {

	let scrollPos = window.pageYOffset;
	let bottomPos = bottom.offsetTop;

	if (scrollPos >= bottomPos / 2) {

		// Hit the bottom of the page


		if (allowNewRequest === true) {
			allowNewRequest = false;
			loadIcon.classList.remove("hide");

			let ajax = new XMLHttpRequest();
			ajax.open("GET", `../alphaAPI/showImage.php?time=${time}&type=image`);
			ajax.send();
			ajax.onreadystatechange = function () {

				if (ajax.readyState == 4 && ajax.status == 200) {
					let back = ajax.response;
					back = JSON.parse(back);

					let max = back[back.length - 1].max;
					back = back;

					if (time != max) {

						(function () {
							for (let i = 0; i < back.length -1; i++) {
								time++;
								allowNewRequest = true;



								// append the elelemet to the DOM

								let mainDiv = document.createElement("div");
								let imgEl = document.createElement("img");
								let link = document.createElement("a");
								let pForLink = document.createElement("p");
								let removeForm = document.createElement("form");
								let removeButton = document.createElement("input");
								let removeId = document.createElement("input");

								mainDiv.className = "assets image";
								mainDiv.appendChild(link);
								link.setAttribute("href", `https://codepenassets.ml/${back[i].orgURL}`);
								link.setAttribute("target","_blank");
								link.appendChild(imgEl);
								imgEl.setAttribute("src", `https://codepenassets.ml/${back[i].orgURL}`);
								mainDiv.appendChild(pForLink);
								pForLink.textContent = `https://codepenassets.ml?${back[i].newURL}`;
								mainDiv.appendChild(removeForm);
								removeForm.appendChild(removeButton);
								removeForm.appendChild(removeId);
								removeForm.setAttribute("action", "removeImage.php");
								removeForm.className = "removeImage";
								removeForm.setAttribute("method", "POST");
								removeButton.className = "fa fa-times";
								removeButton.setAttribute("value", "Remove");
								removeButton.setAttribute("type", "submit");
								removeId.setAttribute("type", "hidden");
								removeId.setAttribute("value", back[i].newURL);
								removeId.setAttribute("name", "id");



								document.querySelector(".showAssets").appendChild(mainDiv);


							}
						})();

						loadIcon.classList.add("hide");
					} else {
						loadIcon.classList.add("hide");
					}


				}


			}


		}


	}


});
