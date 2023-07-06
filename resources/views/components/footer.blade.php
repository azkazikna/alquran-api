    <footer class="text-muted bg-light mt-5">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p><span class="text-dark font-weight-bold">QuranAzka</span> merupakan website yang dibuat biar kalian pada baca terus gua dapet pahala hayyukkk</a></p>
        <p>Dibuat oleh <a href="https://github.com/azkazikna">Azkazikna Ageung Laksana</a> dengan API <a href="https://equran.id/apidev">equran.id</a>.</p>
      </div>
    </footer>
    
    <!-- Optional JavaScript; choose one of the two! -->
    @livewireScripts

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    
    <script>
      $(document).ready(function() {

      $('#navbarSideButton').on('click', function() {
        $('#navbarSide').addClass('reveal');
        $('.overlay').show();
      });

      $('.overlay').on('click', function(){
        $('#navbarSide').removeClass('reveal');
        $('.overlay').hide();
      });
      

      });
    </script>
