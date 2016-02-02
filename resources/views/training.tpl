{extends file="assets/index.tpl"}

{block name="content"}
        <div class="apa">
            <div class="apb">
                <h6 class="apd">Module</h6>
                <h2 class="apc">Schulungen</h2>
            </div>

            <div class="ob ape">
                <div class="tn aol">
                    <input type="text" value="01/01/15 - 01/08/15" class="form-control" data-provide="datepicker">
                    <span class="bv wt"></span>
                </div>
            </div>
        </div>

        <div class="akg ue">
            <div class="akh aki">
                <div class="tn aol">
                    <input type="text" class="form-control aqr" placeholder="Schulungen suchen..">
                    <span class="bv adn"></span>
                </div>
            </div>
            <div class="akh">
                <div class="nz">
                    <button type="button" class="ce apn">
                        <span class="bv aez"></span>
                    </button>
                    <button type="button" class="ce apn">
                        <span class="bv zz"></span>
                    </button>
                </div>
            </div>
        </div>

        <div class="ud">
            <div class="eg">
                <table class="cl" data-sort="table">
                    <thead>
                    <tr>
                        <th class="header"><input type="checkbox" class="aqk" id="selectAll"></th>
                        <th class="header headerSortDown">ID</th>
                        <th class="header">Datum</th>
                        <th class="header">Name</th>
                        <th class="header">Mindest Punktzahl</th>
                        <th class="header">Typ</th>
                    </tr>
                    </thead>
                    <tbody>
                        {for $i = 0 to 25}
                        <tr>
                            <td><input type="checkbox" class="aql"></td>
                            <td><a href="#">#100{$i}</a></td>
                            <td>02.01.2016</td>
                            <td>Developer Advanced</td>
                            <td>100</td>
                            <td>Developer</td>
                        </tr>
                        {/for}
                    </tbody>
                </table>
            </div>
        </div>

        <div class="db">
            <ul class="ow">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </div>

{/block}