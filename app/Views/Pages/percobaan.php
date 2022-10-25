<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>dark mode</title>
  </head>
  <body>
    <h1>hello wolrd</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eu cursus augue. Nullam consequat, dolor sed ultricies hendrerit, tellus ligula volutpat velit, vitae finibus purus arcu tincidunt diam. Curabitur vel turpis risus. Mauris vel tellus posuere, facilisis sapien pretium, tristique neque. Suspendisse posuere leo vitae semper ornare. In hac habitasse platea dictumst. Suspendisse a nisl enim. Maecenas efficitur felis dolor, at consectetur metus porta eu. Aliquam hendrerit lectus ac odio gravida, id molestie lacus accumsan.</p>

    <script type="text/javascript">
      if (localStorage.getItem('preferedTheme') == 'dark') {
        setDarkMode(true)
      }
      function setDarkMode(isDark) {
        var darkBtn = document.getElementById('darkBtn')
        var lightBtn = document.getElementById('lightkBtn')
      }
    </script>
  </body>

</html>
