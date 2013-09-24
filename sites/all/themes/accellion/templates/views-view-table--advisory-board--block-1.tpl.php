<?php
/**
 * @file views-view-table.tpl.php
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>
<div style="position:relative; bottom:80px;">

<table <?php if ($classes) { print 'class="'. $classes . '" '; } ?><?php print $attributes; ?>>
  <?php if (!empty($title)) : ?>
    <h2><?php print $title; ?></h2>
  <?php endif; ?>
  <?php if (!empty($header)) : ?>
    <thead>
      <tr>
        <?php foreach ($header as $field => $label): ?>
          <th <?php if ($header_classes[$field]) { print 'class="'. $header_classes[$field] . '" '; } ?>>
            <?php print $label; ?>
          </th>
        <?php endforeach; ?>
      </tr>
    </thead>
  <?php endif; ?>
  <tbody>
    <?php foreach ($rows as $row_count => $row): ?>
      <tr class="<?php print implode(' ', $row_classes[$row_count]); ?>">


<!-- description row -->
<tr>

<!-- logo -->
<td rowspan="3" class="cq-logo-td"><?php print $row['field_advisory_board_image']; ?></td>

<!-- description additional info and link row -->
<td class="cq-desc-fst-td"><b><?php print $row['title']; ?></b>

<tr>
<td class="cq-desc-hgt-td"><b><?php print $row['field_advisory_board_title']; ?></b>
</tr>

<tr>
<td class="cq-desc-hgt-td"><?php print $row['body']; ?>
</tr>



</td>
</tr>



      </tr>
    <?php endforeach; ?>
  </tbody>
</table>


<style>

.cq-logo-td{
  vertical-align:top;
width: 125px;
height: auto;
padding-top: 30px;
}

.cq-desc-hgt-td{
  vertical-align:top;
padding-top: 5px;
padding-left: 10px;
font-size: 12px;
margin-top: 10px;
margin-right: 0px;
margin-bottom: 15px;
margin-left: 0px;
line-height: 21px; 
}

.cq-desc-fst-td{
  vertical-align:top;
padding-top: 30px;
padding-left: 10px;
}

.cq-desc-lst-td{
  vertical-align:top;
padding-top: 0px;
padding-left: 10px;
font-size: 12px;
}

</style>

</div>