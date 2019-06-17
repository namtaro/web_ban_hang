
         <footer >
            <div class="container-fluid">
                <div class="row">
                    <div   class="vitifoot col-xs-12 col-sm-4 col-md-4 col-lg-4">
                      <p><h3><span class="glyphicon glyphicon-fire" aria-hidden="true"></span>Linh Kiện Shop</h3></p>
                      
                     <h3> © Copyright NGUYỄN HOÀNG NAM 2019 linhkienshop.com</h3>
                    </div>
                    <div style="background-color: #111111;"  class="vitifoot col-xs-6 col-sm-2 col-md-2 col-lg-2">
                      <h3>Linh kiên shop</h3>
                      <ul>
                        <li><a href="#">Giới thiệu</a></li>
                        <li><a href="#">Liên hệ</a></li>
                        <li><a href="#">Công nghệ</a></li>
                      </ul>
                    </div>
                    <div style="background-color: #111111;"  class="vitifoot col-xs-6 col-sm-3 col-md-3 col-lg-3">
                      <h3>Mạng xã hội</h3>
                        <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">TWITTER</a></li>
                        <li><a href="#">TELEGRAM</a></li>
                      </ul>
                    </div>
                    <div style="background-color: #111111;"  class="tkfr vitifoot col-xs-12 col-sm-3 col-md-3 col-lg-3">
                        <h3>Tài khoản</h3>
                        <ul>
                        <li><a href="#">Trang chủ</a></li>
                        @if(Auth::guard('CustomerModel')->check())
                        <li><a href="{{ route('getLogout_cus') }}">Đăng xuất</a></li>
                        @endif
                      </ul>
                    </div>
                </div>
            </div>

        </footer>



       
        
        <!-- endlogin -->
     <script src="{!! asset('public/tmt_admin/template/js/jquery.min.js') !!}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{!! asset('public/tmt_admin/template/js/bootstrap.min.js') !!}"></script>

<script type="text/javascript" src="{!! asset('public/tmt_admin/template/js/script.js') !!}"></script>
  </body>
</html>