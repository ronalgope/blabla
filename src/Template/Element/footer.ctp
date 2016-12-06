  <!-- Footer -->
  <div id="footer">
    <div id="footer-container">
      <ul class="footer-list row">
        <li class="buy-home-about col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Buyhome
          </h1>
          <ul class="footer-sublist">
            <li><?= $this->Html->link('Tentang Buyhome',['controller'=>'Pages','action'=>'tentang']) ?></li>
            <li><?= $this->Html->link('Aturan Penggunaan',['controller'=>'Pages','action'=>'aturan_pengguna']) ?></li>
            <li><?= $this->Html->link('Karir',['controller'=>'Pages','action'=>'karir']) ?></li>
            <li><?= $this->Html->link('Mitra Buyhome',['controller'=>'Pages','action'=>'mitra']) ?></li>
          </ul>
        </li>
        <li class="pembeli-footer col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Pembeli
          </h1>
          <ul class="footer-sublist">
            <li><?= $this->Html->link('Cara Membeli',['controller'=>'Pages','action'=>'cara_membeli']) ?></li>
            <li><?= $this->Html->link('Keamanan Pembayaran',['controller'=>'Pages','action'=>'keamanan']) ?></li>
            <li><?= $this->Html->link('Simulasi KPR',['controller'=>'Pages','action'=>'simulasi']) ?></li>
            <li><a href="#">Artikel</a></li>
          </ul>
        </li>
        <li class="mensos-temukan col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Temukan Kami di
          </h1>
          <div class="medsos-footer">
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i>&nbsp;</a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>&nbsp;</a>
          </div>
        </li>
        <li class="newsletter-footer col-md-3 col-sm-6 col-xs-12">
          <h1 class="title">
            Buyhome News Letter
          </h1>
          <form action="#" class="searchform">
            <input type="text" placeholder="Your email address" />
            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
            <p>Dapatkan berita terbaru dari <br />
              website kami...</p>
          </form>
        </li>
      </ul>

    </div>
    <div class="copy-right">
      Copyright © 2016 PT Buy Group Indonesia
    </div>
  </div>
  <!-- footer-end-->