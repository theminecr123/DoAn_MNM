<?php
include_once 'app/views/share/header.php' ?>

<?php
    if(isset($errors)){
        foreach($errors as $x){
            echo '<li>$x</li>';
        }
        echo '</ul>';
    }
?>

<form class="user" action="/DoAn_MNM/product/save" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="text" style="border: 2px dashed black;" class="form-control form-control-user"  placeholder="Name" name="name">
    </div>
    <div class="form-group">
        <input type="text" style="border: 2px dashed black;" class="form-control form-control-user" placeholder="Description" name="description">
    </div>
    <div class="form-group">
        <input type="text" style="border: 2px dashed black;"  class="form-control form-control-user" placeholder="Price" name="price">
    </div>
    <div class="form-group">
        <input type="file" style="border: 2px dashed black;" class="form-control form-control-user" name="image" id="image-upload">
        <img id="image-preview" src="" alt="Image Preview" style="display: none; max-width: 200px; margin-top: 10px;">
    </div>

    <!-- <button href="index.html" style="width:100px;" class="btn btn-primary btn-user btn-block" name = "submit">Submit</button> -->

    <button  href="index.html"style="width:150px; height:50px;" class="btn btn-primary btn-user btn-block" name = "submit">
  <div class="svg-wrapper-1">
    <div class="svg-wrapper">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        width="24"
        height="24"
      >
        <path fill="none" d="M0 0h24v24H0z"></path>
        <path
          fill="currentColor"
          d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"
        ></path>
      </svg>
    </div>
  </div>
  <span>Submit</span>
</button>

<style>
    button {
  font-family: inherit;
  font-size: 20px;
  background: royalblue;
  color: white;
  padding: 0.7em 1em;
  padding-left: 0.9em;
  display: flex;
  align-items: center;
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: all 0.2s;
  cursor: pointer;
}

button span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
  margin-top:-25px;
  font-weight: bold;
  font-size:18px;
}

button svg {
  display: block;
  transform-origin: center center;
  /* transition: transform 0.3s ease-in-out; */
}

button:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

button:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

button:hover span {
  transform: translateX(1em);
}

button:active {
  transform: scale(0.95);
}

@keyframes fly-1 {
  from {
    transform: translateY(0.1em);
  }

  to {
    transform: translateY(-0.1em);
  }
}

</style>

</form>

<?php
include_once 'app/views/share/footer.php' ?>

<script>
    // Function to handle image upload and preview
    function handleImageUpload(event) {
        const file = event.target.files[0]; // Get the uploaded file
        const imagePreview = document.getElementById('image-preview'); // Get the image preview element

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };

            reader.readAsDataURL(file);

            imagePreview.style.display = 'block';
        } else {
            imagePreview.style.display = 'none';
        }
    }

    const imageUpload = document.getElementById('image-upload');
    imageUpload.addEventListener('change', handleImageUpload);
</script>
