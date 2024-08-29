function previewImage(){

    const image = document.querySelector('.imagepreview');
    const value = document.querySelector('.imagevalue');

    console.log(value)

    const reader = new FileReader();
    reader.readAsDataURL(value.files[0]);
    reader.onload = e => image.src = e.target.result;
}