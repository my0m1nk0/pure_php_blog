<?php 
 require_once 'layout/header.php';
 if(isset($_POST['create']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
   $cat = new Categories();
   $create = $cat->store($_POST);
  
   if($create->success){
      header('Location:index.php');
   }else{
      $error = $create->error;
   }
 }
?>
   <section class="grid grid-cols-12 mt-10 gap-4">
       <a href="index.php" class="col-start-3 col-span-8 flex items-center text-red-500">
           <i class="material-icons">arrow_back</i> Back
       </a>
        <div class="col-start-5 col-span-4 text-justify">
           
            <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="POST" class="shadow-lg border border-gray-700 rounded-sm py-2 px-5 flex flex-col gap-5"
            autocomplete="off">
               <h1 class="mx-auto w-max text-xl text-gray-300">New Category</h1>
               
               <?php echo isset($error) ? "<p class='text-red-500 text-center'>$error</p>" : ''; ?>
               <div class="relative">
                  <i class="material-icons absolute text-gray-400">category</i>
                  <input type="text" name="name" placeholder="Enter Category Name"
                        class="w-full bg-transparent pl-8 pb-1 outline-none text-gray-300
                        border-b border-gray-500" autofocus>
               </div>
               <div class="flex items-center gap-2">
                  <!-- Rounded switch -->
                     <label class="switch">
                        <input type="checkbox" name="is_publish" checked>
                        <span class="slider round"></span>
                     </label>
                     <span class="text-gray-400 text-sm">Is Publish</span>
               </div>
               <button type="submit" name="create" class="w-full text-center mb-2 text-sm py-1 px-3
                  bg-gradient-to-r from-red-500 to-gray-700 text-gray-300 rounded-sm 
                  hover:shadow-lg">
                        Create
               </button>
            </form>

        </div>
   
   </section>
<?php 
 require_once 'layout/footer.php';
?>
