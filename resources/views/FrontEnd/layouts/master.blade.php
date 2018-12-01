<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    @include('FrontEnd.partials/styles')
    <title>
      @yield('title','Ecommerce Site')
    </title>
  </head>
  <body>

    <!-- Start Customised Wrapper Class -->
    <div class="wrapper">


<!-- navigaetion include -->
@include('FrontEnd.partials.nav')

<!-- For Viewing Message and errors -->
@include('FrontEnd.partials.messages')


<!-- Start of Sidebar + Content -->
@yield('content')

<!-- End  of Sidebar + Content -->

<!-- Start of footer -->

@include('FrontEnd.partials/footer')


<!-- End Of Footer -->

<!-- End of Wrapper Div -->
    </div>


@include('FrontEnd.partials.scripts')

<!-- For Customized Script Just creae a section  -->
@yield('Customized_scripts')

  </body>
</html>
