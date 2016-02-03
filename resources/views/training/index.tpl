{extends file="assets/index.tpl"}

{block name="content"}
    <div class="apa">
        <div class="apb">
            <h6 class="apd">Module</h6>
            <h2 class="apc">{$training.name} <a href="{{Route('backend.trainings.edit', [$training->id, $training->slug])}}" type="button" class="ce apn">
                    <span class="bv aez"></span> bearbeiten
                </a></h2>
        </div>

    </div>


    <h3>Termine</h3>

    <div class="ud">
        <div class="eg">
            <table class="cl" data-sort="table">
                <thead>
                <tr>
                    <th class="header headerSortDown">Von</th>
                    <th class="header">Bis</th>
                    <th class="header">Angemeldet</th>
                </tr>
                </thead>
                <tbody>
                {foreach $training.exams as $exam}
                    <tr>
                        <td>{$exam.date_start|date_format}</td>
                        <td>{$exam.date_end}</td>
                        <td>{$exam.attendees|count}</td>
                        <td>
                            <a href="{{Route('backend.trainings.exams.attendees.index', [$training->id, $exam->id])}}" type="button" class="ce apn">
                                <span class="bv aez"></span> bearbeiten
                            </a>
                        </td>
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