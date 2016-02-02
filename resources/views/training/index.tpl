{extends file="assets/index.tpl"}

{block name="content"}
    <div class="apa">
        <div class="apb">
            <h6 class="apd">Module</h6>
            <h2 class="apc">{$training.name}</h2>
        </div>

    </div>

    <div class="akg ue">
        <div class="akh aki">
            <div class="tn aol">
                <input type="text" class="form-control aqr" placeholder="Teilnehmer suchen..">
                <span class="bv adn"></span>
            </div>
        </div>
        <div class="akh">
            <div class="nz">
                <a href="{{Route('trainings.edit', [$training->id, $training->slug])}}" type="button" class="ce apn">
                    <span class="bv aez"></span> bearbeiten
                </a>
                <button type="button" class="ce apn">
                    <span class="bv zz"></span>
                </button>
            </div>
        </div>
    </div>

    <h3>Teilnehmer ({$training.attendees|count} / {$training.maxAttendees})</h3>

    <div class="ud">
        <div class="eg">
            <table class="cl" data-sort="table">
                <thead>
                <tr>
                    <th class="header"><input type="checkbox" class="aqk" id="selectAll"></th>
                    <th class="header">Vorname</th>
                    <th class="header">Nachname</th>
                    <th class="header headerSortDown">Unternehmen</th>
                    <th class="header">Bestanden</th>
                </tr>
                </thead>
                <tbody>
                {foreach $training.attendees as $attendee}
                    <tr>
                        <td><input type="checkbox" class="aql"></td>
                        <td>{$attendee.firstname}</td>
                        <td>{$attendee.lastname}</td>
                        <td>{$attendee.company}</td>
                        <td>No</td>
                    </tr>
                {/foreach}
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