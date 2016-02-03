{extends file="assets/index_attendee.tpl"}

{block name="content"}
    <div class="question-group">
        <h1>Wie viele Entwickler braucht man zum Neustarten von Apache?</h1>
        <ul>
            <li>
                <input type="checkbox" data-labelauty="{literal}{smarty widget text laww open=1 blaa = blub}{/literal}"/>
            </li>
            <li>
                <input type="checkbox" data-labelauty="{literal}{smarty widget text laww open=1 blaa = blub maaaa=1}{/literal}"/>
            </li>
            <li>
                <input type="checkbox" data-labelauty="{literal}{smarty widget text laww open=1 blaa = blub maaa=2 wuf=3}{/literal}"/>
            </li>

        </ul>
    </div>
{/block}