{if $success eq "no"} <div class="alert alert-danger">Введите числовое значение.</div> {/if}
{if $confirmation eq 'ok'}  <div class="alert alert-success">Settings updated</div> {/if}
<fieldset>
    <h2>Ценовой диапaзон</h2>
    <div class="panel">
        <div class="panel-heading">
            <legend><img src="../img/admin/cog.gif" alt="" width="16"
                />Конфигурация</legend>
        </div>
        <form action="" method="post">
            <div class="form-group clearfix">
                <label class="col-lg-3">Цена от:</label>
                <div class="col-lg-9">
                    <input type="text" id="price_from"
                           name="price_from" {if isset($price_from)} value="{$price_from}" {else} value="0" {/if} />
                </div>
            </div>
            <div class="form-group clearfix">
                <label class="col-lg-3">Цена до:</label>
                <div class="col-lg-9">
                    <input type="text" id="price_to"
                           name="price_to" {if isset($price_to)} value="{$price_to}" {else} value="0" {/if}/>
                </div>
            </div>
            <div class="panel-footer">
                <input class="btn btn-default pull-right" type="submit"
                       name="mymod_pc_form" value="Save" />
            </div>
        </form>
    </div>
</fieldset>