<!DOCTYPE html>
<html>
    <body>

<p id="p1">GeeksforGeeks</p>

        <label for="colors">Color:</label>
        <input type="color" value="#ff0000" id="colors" />

<p>A Computer Science Portal For Geeks.</p>

        <script>
            var colors;
            var defaultColor = "#0000ff";
            window.addEventListener("load", startup, false);
            function startup() {
                colors = document.querySelector("#colors");
                colors.value = defaultColor;
                colors.addEventListener("input", updateFirst, false);
                colors.addEventListener("change", updateAll, false);
                colors.select();
            }
            function updateFirst(event)
            {
                var p = document.querySelector("#p1");
                if (p)
                {
                    p.style.color = event.target.value;
                }
            }
        </script>
    </body>
</html>
