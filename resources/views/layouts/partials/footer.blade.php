<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      {{-- <b>Version</b> 3.0.2 --}}
    </div>
    <strong>Copyright &copy; 2020 <a href="{{ route('home') }}">CRM CE LOGIC</a>.</strong> All rights
    reserved.
  </footer>
  
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <script src="{{ asset('js/app.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
  {{-- <script src="{{ asset('js/pace.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('js/custom.js') }}"></script> --}}
  @include('helpers.toasts')
  @yield('js')
  
  </body>
  
  </html>