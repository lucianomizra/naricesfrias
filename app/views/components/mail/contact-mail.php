<head></head>
<body>
  <table style='border:0;border-spacing:0;border-collapse:collapse'>
  <tr>
    <td style='vertical-align:top'><img style='margin-bottom:5px' src='<?= layout('logo-mail.png') ?>'><br></td>
  </tr>
  <tr>
    <td style='vertical-align:top'>
      <h2 style='margin-top:0;margin-bottom:6px'>Contacto vía web</h2>
      <div style='margin-bottom:3px'><b>Nombre</b> [NAME]</div>
      <div style='margin-bottom:3px'><b>E-mail</b> [MAIL]</div>
      <div style='margin-bottom:3px'><b>Asunto</b> [SUBJECT]</div>
      <div style='margin-bottom:3px'><b>Mensaje</b> <?= nl2br($data['comments']) ?></div>
    </td>
  </tr>
  </table>
</body>
