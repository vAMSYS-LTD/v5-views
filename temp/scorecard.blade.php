<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Card for {{ $airlineName }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: lightgray;
        }
        h1 {
            text-align: center;
        }
        .week {
            margin: 20px 0;
        }
        .week h2 {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .task-list {
            padding-left: 20px;
        }
        .task {
            margin: 5px 0;
            display: flex;
            align-items: center;
        }
        .tick {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 10px;
            border-radius: 50%;
        }
        .green-tick {
            background-color: green;
        }
        .red-tick {
            background-color: red;
        }
        .yellow-tick {
            background-color: yellow;
        }
        .task-details {
            display: flex;
            flex-direction: column;
        }
        .task-title {
            font-weight: bold;
        }
        .task-notes {
            font-style: italic;
            color: gray;
        }
        .task-docs a {
            color: blue;
            text-decoration: underline;
        }
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            text-align: center;
        }
        .summary-table th, .summary-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }
        .summary-table th {
            font-weight: bold;
        }
    </style>
</head>
<body>

<h1>v5 Migration Preparedness <br/>
Report Card for {{ $airlineName }}</h1>

<!-- Global Summary Table -->
<table class="summary-table">
    <thead>
    <tr>
        <th>Week 1</th>
        <th>Week 2</th>
        <th>Week 3</th>
        <th>Week 4</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td><span class="tick {{ $results->summary->week1_complete?'green-tick':'red-tick' }}"></span>{{ $results->summary->week1_complete?'Complete':'Incomplete' }}</td>
        <td><span class="tick {{ $results->summary->week2_complete?'green-tick':'red-tick' }}"></span> {{ $results->summary->week2_complete?'Complete':'Incomplete' }}</td>
        <td><span class="tick {{ $results->summary->week3_complete?'green-tick':'red-tick' }}"></span> {{ $results->summary->week3_complete?'Complete':'Incomplete' }}</td>
        <td><span class="tick {{ $results->summary->week4_complete?'green-tick':'red-tick' }}"></span> {{ $results->summary->week4_complete?'Complete':'Incomplete' }}</td>
    </tr>
    </tbody>
</table>

<h1
    style="color: {{ ($results->summary->week1_complete && $results->summary->week2_complete && $results->summary->week3_complete && $results->summary->week4_complete) ? 'green' : 'red' }}"
>{{ $airlineName }} {{ ($results->summary->week1_complete && $results->summary->week2_complete && $results->summary->week3_complete && $results->summary->week4_complete) ? 'is v5 Ready' : 'is not v5 ready' }}</h1>
@if(!($results->summary->week1_complete && $results->summary->week2_complete && $results->summary->week3_complete && $results->summary->week4_complete))
    <div style="font: bold; text-align: center">
        You are urged to not delay any further and complete the migration steps outlined in <a href="https://docs.vamsys.dev/migration/checklist" target="_blank">Documentation.</a>
    </div>
    <div style="font: bold; text-align: center">
        v5 is slated to launch on 24th September and if you do not complete the migration, your VA will not work as intended.
    </div>
@endif

<!-- Week 1 -->
<div class="week">
    <h2>Week 1</h2>
    <ul class="task-list">
        <li class="task">
            <span class="tick {{ $results->week1->owner_permissions > 0?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Staff Permissions - Owner</span>
                <span class="task-notes">Staff who are Owners, with permission to access Orwell and VDS. Need at least 1</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#setting-up-staff" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->staff_permissions > 0?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Staff Permissions - Staff</span>
                <span class="task-notes">Staff who are not Owners, with permission to access Orwell and VDS. Expects at least 1, but it's OK if there are none if you have no other Staff in your VA</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#setting-up-staff" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->support_email == false?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Pilot Support Email</span>
                <span class="task-notes">Part of Airline Settings Setup</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#airline-settings" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick yellow-tick }}"></span>
            <div class="task-details">
                <span class="task-title">Pilot Sharing Agreements</span>
                <span class="task-notes">If you had any in v3, you need to re-enter into them in v5</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#share-agreements" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->rank_abbreviations_missing == 0?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Rank Abbreviations</span>
                <span class="task-notes">v5 Ranks need Abbreviations</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#rank-setup" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->rank_image_missing == 0?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Rank Images</span>
                <span class="task-notes">v5 rank images need to be migrated over</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#rank-setup" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->logos_missing == false ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">VA Logos</span>
                <span class="task-notes">VA Logos need to be uploaded in v5</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#logo" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->phoenix_dashboard_missing == false ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Phoenix Dashboard</span>
                <span class="task-notes">Setting Up Dashboard for your Pilots</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#phoenix-dashboard" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week1->registration_email_missing == false ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">New Pilot Registration Email</span>
                <span class="task-notes">Emails are fully customisable and need to be created</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#emails" target="_blank">View Documentation</a></span>
            </div>
        </li>
    </ul>
</div>

<!-- Week 2 -->
<div class="week">
    <h2>Week 2</h2>
    <ul class="task-list">
        <li class="task">
            <span class="tick {{ $results->week2->fleets_without_types == 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Fleets without Fleet Type</span>
                <span class="task-notes">{{ $results->week2->fleets_without_types }} Fleets missing Fleet Type</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#fleets-and-aircraft" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week2->fleets_without_prefixes == 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Fleets without Prefixes</span>
                <span class="task-notes">{{ $results->week2->fleets_without_prefixes }} Fleets missing Prefix/Allowed Callsigns</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#fleets-and-aircraft" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week2->hubs > 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Hubs</span>
                <span class="task-notes">{{ $results->week2->hubs }} have been created. Need at least 1</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#hubs" target="_blank">View Documentation</a></span>
            </div>
        </li>

        <li class="task">
            <span class="tick {{ $results->week2->custom_pages > 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Pages</span>
                <span class="task-notes">Pages, if used - need to migrated over from v3 by hand. Expects to see at least 1 page</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#pages" target="_blank">View Documentation</a></span>
            </div>
        </li>
        <li class="task">
            <span class="tick {{ $results->week2->acars_page > 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Pegasus ACARS Page</span>
                <span class="task-notes">Pegasus ACARS Page needs to be created</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#acars-resource-page" target="_blank">View Documentation</a></span>
            </div>
        </li>
    </ul>
</div>

<!-- Week 3 -->
<div class="week">
    <h2>Week 3</h2>
    <ul class="task-list">
        <li class="task">
            <span class="tick {{ $results->week3->fleets_with_no_scoring_group == 0 ?'green-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Fleets have Scoring Groups set</span>
                <span class="task-notes">Fleets need to have a Scring Group Created for them. {{ $results->week3->fleets_with_no_scoring_group }} are not assigned any scoring group.</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#scoring-groups" target="_blank">View Documentation</a></span>
            </div>
        </li>
    </ul>
</div>

<!-- Week 4 -->
<div class="week">
    <h2>Week 4</h2>
    <ul class="task-list">
        <li class="task">
            <span class="tick {{ $results->week4->routes > 0 ?'yellow-tick':'red-tick' }}"></span>
            <div class="task-details">
                <span class="task-title">Routes</span>
                <span class="task-notes">v5 Needs Routes. Your VA has {{ $results->week4->routes }} created.</span>
                <span class="task-docs"><a href="https://docs.vamsys.dev/migration/checklist#routes" target="_blank">View Documentation</a></span>
            </div>
        </li>
    </ul>
</div>

</body>
</html>
