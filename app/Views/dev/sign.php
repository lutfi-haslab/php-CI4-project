<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
</head>

<body>

  <p>Halo</p>
  <div class="bg-red-500 p-4 w-full">
    <canvas class="bg-white"></canvas>
    <button id="btn-save" onclick="btnSave()">Save Signature</button>
  </div>
  <script>
    const canvas = document.querySelector("canvas");
    // const btnSave = document.getElementById('btn-save');

    const signaturePad = new SignaturePad(canvas);
    signaturePad.penColor = "rgb(66, 133, 244)";

    // Returns signature image as data URL (see https://mdn.io/todataurl for the list of possible parameters)
    function btnSave()
    {
      var dataURL = signaturePad.toDataURL();
      console.log(dataURL);
    }
  </script>
</body>

</html>