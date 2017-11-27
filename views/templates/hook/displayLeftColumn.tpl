<h3 class="page-product-heading">Товары</h3>
<div class="rte">
    {if $success eq "no"} <div class="alert alert-danger">Товары не подобраны.</div> {/if}
    <p>Ценовой диапозон от {$result['price_from']} до {$result['price_to']}</p>
    {if $search eq "no"} <div class="alert alert-danger">Товары не найдены.</div> {/if}
    <p>Количество товаров: {$result['quantity']}</p>
</div>