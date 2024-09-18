<div class="flex flex-col space-y-4">
    <div class="card">
        <div class="card-header flex justify-between items-center">
            <h4 class="card-title">General Information</h4>
        </div>

        <div class="px-6 py-2">
            <div>
                All PIREPs submitted are processed automatically. A PIREP may take up to ten (10) minutes to be processed, during the course of which, PIREP will go through several states.
            </div>
            <div>
                PIREPs with the status of <span class="font-bold">'Reply Needed'</span> require prompt attention by you. You will not be able to start any new flights until after you respond to these PIREPs.
            </div>
            <div>
                Leaving a PIREP Comment, whether via Pegasus or vAMSYS, will automatically result in PIREP sent for staff review.
            </div>
            <div>
                PIREPs in the Processing or Scoring state need no action from you - you can book next flight and start flying without the processing or scoring completing.
            </div>
        </div>
        <div class="striped-table">
            <table class="text-left">
                <thead>
                <tr>
                    <th>PIREP Status</th>
                    <th>Description</th>
                    <th>Your Action Needed</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Accepted</td>
                        <td>PIREP has been Reviewed and Accepted by the Team. Hours and Points are awarded.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Complete</td>
                        <td>PIREP completed automated processing and no red flags were detected. Hours and Points are awarded.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Rejected</td>
                        <td>Team has reviewed the PIREP and it was Rejected. Hours are awarded, but points are not.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Invalidated</td>
                        <td>Team has reviewed the PIREP and it was Invalidated. No Hours and no points are awarded.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Awaiting Review</td>
                        <td>PIREP has satisfied one of the Failure Conditions and is now awaiting review by the Team.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Reply Needed</td>
                        <td>PIREP needs your urgent input before it can be reviewed by the Team</td>
                        <td>Look into the PIREP As Soon As Possible.</td>
                    </tr>
                    <tr>
                        <td>Processing</td>
                        <td>PIREP is undergoing Processing phase.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                    <tr>
                        <td>Scoring</td>
                        <td>PIREP is undergoing Scoring phase.</td>
                        <td>None. Book another Flight and Fly.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <livewire:phoenix.resources.scores.reject-rules/>
    <livewire:phoenix.resources.scores.aircraft-rules />
</div>
