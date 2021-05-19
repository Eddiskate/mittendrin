<h1>Tłumaczenia strony:</h1>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Słowo kluczowe</th>
      <th>Stała zmienna</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bpcms_lang_texts as $bpcms_lang_text): ?>
    <tr>
      <td width="250"><a href="<?php echo url_for('bpcmsLangText/edit?text_name='.$bpcms_lang_text->getTextName()) ?>"><?php echo $bpcms_lang_text->getTextName() ?></a></td>
      <td>
          <input type="text" value="<?php echo 'LANG_'.strtoupper($bpcms_lang_text->getTextName()) ?>" class="input-xxlarge">
          <p><?php echo $bpcms_lang_text->getTextValue() ?></p>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

