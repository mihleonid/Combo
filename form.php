<?php include("top.php");?>
<h2>Формулы</h2>
<dl>
<dt>Сумма чисел от n до k</dt>
<dd>(n + k) * (n + k - 1) / 2</dd>
<!--
<p>
Перемещения с повторениями
<br>
---------------------
</p>
<p>
Перемещения без повторений
<br>
---------------------
</p>
<p>
<p>
Размещения с повторениями
<br>
---------------------
</p>-->
<dt>Биномиальный коэффициент (сочетания без повторений)</dt>
<dd>C<sup>k</sup><sub>n</sub> = n! / (n - k)! / k! = n * (n - 1) *...* (n - k + 1) / k!</dd>
<dt>Сочетания с повторениями</dt>
<dd><span style="text-decoration: overline;">C</span><sup>k</sup><sub>n</sub> = C<sup>k</sup><sub>n + k + 1</sub></dd>
<dt>Размещения без повторений</dt>
<dd>А<sup>k</sup><sub>n</sub>=n(n-1)...(n-k+1).</dd>
<dt>Перестановки без повторений</dt>
<dd>P<sub>n</sub>=n!=1*2*...*n</dd>
<dt>Перестановки с повторениями</dt>
<dd><span style="text-decoration: overline;">P</span><sub>(n<sub>1</sub>, n<sub>2</sub>,..., n<sub>k</sub>)</sub>= n!/n<sub>1</sub>!/n<sub>2</sub>!/.../ n<sub>k</sub>!</dd>
<?php include("bottom.php");?>