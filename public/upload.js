
/** Variables */
let files = [],
dragArea = document.querySelector('#drag-area'),
input = document.querySelector('#drag-area input'),
select = document.querySelector('#drag-area .select'),
containerline = document.querySelector('.containerline');

/** CLICK LISTENER */
select.addEventListener('click', () => input.click());

/* INPUT CHANGE EVENT */
input.addEventListener('change', (e) => {
	let file = input.files;

    // if user select no image
    if (file.length == 0) return;

	for(let i = 0; i < file.length; i++) {
        if (file[i].type.split("/")[0] != 'image') continue;
        if (!files.some(e => e.name == file[i].name)) files.push(file[i])
    }

	showImages();
});

/** SHOW IMAGES */
function showImages() {
	containerline.innerHTML = files.reduce((prev, curr, index) => {
		return `${prev}
		    <div class="image">
			    <span onclick="delImage(${index})"></span>
			    <img src="${URL.createObjectURL(curr)}" />
			</div>`
	}, '');
}

// /* DROP EVENT */
dragArea.addEventListener('drop', e => {
    e.preventDefault();
    dragArea.classList.remove('dragover');

    let file = e.dataTransfer.files;
    files = []; // Kosongkan array files sebelum menambahkan yang baru

    for (let i = 0; i < file.length; i++) {
        /** Check selected file is image */
        if (file[i].type.split("/")[0] != 'image') continue;

        files.push(file[i]);
    }
    showImages();
});

dragArea.ondragover = dragArea.ondragenter = function(evt) {
  evt.preventDefault();
};

dragArea.ondrop = function(evt) {
  // pretty simple -- but not for IE :(
  input.files = evt.dataTransfer.files;
  console.log(input.files )



  const dT = new DataTransfer();
  for (let i = 0; i < input.files.length; i++) {
		/** Check selected file is image */
        dT.items.add(evt.dataTransfer.files[i])
		// if (file[i].type.split("/")[0] != 'image') continue;

		// if (!file.some(e => e.name == file[i].name)) files.push(file[i])
	}
showImages();
  input.files = dT.files;

  evt.preventDefault();
};




