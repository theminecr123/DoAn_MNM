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

<form class="user" action="/DoAn_MNM/product/edit" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>">
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="name" value="<?php echo $product->name; ?>" placeholder="Product Name">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="description" value="<?php echo $product->description; ?>" placeholder="Product Description">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="price" value="<?php echo $product->price; ?>" placeholder="Product Price">
    </div>
    <div class="form-group">
        <input type="file" class="form-control form-control-user" name="image" value="<?php echo $product->image; ?>">
    </div>
    <!-- <button type="submit" class="btn btn-primary btn-user btn-block" name="submit">Submit</button> -->

    <button type="submit" class="btn btn-primary btn-user btn-block button_submit_edit" name="submit">
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

</form>

<style>
    .button_submit_edit {
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
  width:120px;
}

.button_submit_edit span {
  display: block;
  margin-left: 0.3em;
  transition: all 0.3s ease-in-out;
}

.button_submit_edit svg {
  display: block;
  transform-origin: center center;
  transition: transform 0.3s ease-in-out;
}

.button_submit_edit:hover .svg-wrapper {
  animation: fly-1 0.6s ease-in-out infinite alternate;
}

.button_submit_edit:hover svg {
  transform: translateX(1.2em) rotate(45deg) scale(1.1);
}

.button_submit_edit:hover span {
  transform: translateX(1.5em);
}

.button_submit_edit:active {
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


<?php
include_once 'app/views/share/footer.php' ?>