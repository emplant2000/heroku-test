<?phpinfo();?>
<html>
<script>
const apiKey = "x1mwcyc2r0du3ripbckdmstr11l6fb36bx6bdgpryerirgi0indnzjpdummnrpog";

fetch("https://api.minepi.com/v2/me", {
  headers: { Authorization: "Key " + apiKey }
})
  .then(res => {
    console.log(res.status === 200 ? "API key OK" : "API key NG (" + res.status + ")");
  })
  .catch(err => console.error("Error:", err));
</script>
  
</html>
