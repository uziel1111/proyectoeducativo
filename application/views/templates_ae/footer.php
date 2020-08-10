
<footer>
  <!-- FOOTER INFO LOGO SEC -->
  <div class="footerInfoArea full-width clearfix bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-9">
          <div class="footerTitle text-white">
            <!-- <?= OWNERDESCR . ' / ' . SYSVERSION ?> -->
          </div>
        </div>
        <div class="col-12 col-sm-3">
          <div class="media">

          </div><!-- .media -->
        </div><!-- .col-auto -->
      </div><!-- .row -->
    </div><!-- .container -->
  </div><!-- .footerInfoArea full-width clearfix -->

</footer>

</div><!-- .main-wrapper -->

<div class="modal" id="wait" data-backdrop="static">
  <div class="spin">
    <i class="fas fa-circle-notch fa-spin"></i>
  </div>
</div><!-- .modal -->


<script>
  feather.replace()
</script>

<!-- Bootstrap and JQuery -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.9.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>



<script type="text/javascript">
  let Header = {
    irArriba: () => {
      $('.ir-arriba').click(function(e) {
        e.preventDefault();
        $('body,html').animate({
          scrollTop: '0px'
        }, 1000);
      });
      $(window).scroll(function() {
        if ($(this).scrollTop() > 0) {
          $('.ir-arriba').slideDown(600);
        } else {
          $('.ir-arriba').slideUp(600);
        }
      });
    }
  };
</script>
<script src="<?= base_url('assets/js/utilerias/mensaje_alert.js'); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>
