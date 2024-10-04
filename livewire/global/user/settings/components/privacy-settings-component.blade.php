<div class="switch">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="card p-6 space-y-5">
            <h5 class="font-semibold text-lg mb-4">Public Profile</h5>
            <p>Your <span class="text-primary">Profile</span> will be visible to all pilots within your Virtual Airlines</p>
            <label class="w-12 h-6 relative">
                <input type="checkbox" wire:model.live="privacy_enable_profile"
                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                       id="custom_switch_checkbox1" />
                <span for="custom_switch_checkbox1"
                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
        </div>
        <div class="card  p-6 space-y-5">
            <h5 class="font-semibold text-lg mb-4">Public PIREPs</h5>
            <p>Your <span class="text-primary">PIREPs</span> will be visible to all pilots within your Virtual Airlines. Has no effect if your profile is private</p>
            <label class="w-12 h-6 relative">
                <input type="checkbox" wire:model.live="privacy_enable_pireps"
                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                       id="custom_switch_checkbox2" />
                <span for="custom_switch_checkbox2"
                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white  dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
        </div>
        <div class="card  p-6 space-y-5">
            <h5 class="font-semibold text-lg mb-4">Leaderboards, Flight Map and List</h5>
            <p>When enabled, your name will show up in <span class="text-primary">Leaderboards, Live Flight Map and List</span> of your Virtual Airlines. On disabling, your name will be obfuscated</p>
            <label class="w-12 h-6 relative">
                <input type="checkbox" wire:model.live="privacy_enable_lists"
                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                       id="custom_switch_checkbox3" />
                <span for="custom_switch_checkbox3"
                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white  dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
        </div>
        <div class="card  p-6 space-y-5">
            <h5 class="font-semibold text-lg mb-4">Allow Friend Requests</h5>
            <p>Should other pilots be able to add you as a <span class="text-primary">Friend</span> on your dashboard</p>
            <label class="w-12 h-6 relative">
                <input type="checkbox" wire:model.live="privacy_enable_friends"
                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                       id="custom_switch_checkbox5" />
                <span for="custom_switch_checkbox5"
                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white  dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
        </div>
        <div class="card  p-6 space-y-5">
            <h5 class="font-semibold text-lg mb-4">Receive email on friend request</h5>
            <p>Would you like us to send out an <span class="text-primary">email</span> when you receive a new friend request</p>
            <label class="w-12 h-6 relative">
                <input type="checkbox" wire:model.live="privacy_enable_friends_email"
                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"
                       id="custom_switch_checkbox5" />
                <span for="custom_switch_checkbox5"
                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white  dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>
            </label>
        </div>
{{--        <div class="card  p-6 space-y-5">--}}
{{--            <h5 class="font-semibold text-lg mb-4">Receive email on PIREP needing Reply</h5>--}}
{{--            <p>Would you like us to send out an <span class="text-primary">email</span> when your PIREP needs a reply in order to be processed</p>--}}
{{--            <label class="w-12 h-6 relative">--}}
{{--                <input type="checkbox" wire:model.live="privacy_enable_pireps_reply_email"--}}
{{--                       class="custom_switch absolute w-full h-full opacity-0 z-10 cursor-pointer peer"--}}
{{--                       id="custom_switch_checkbox5" />--}}
{{--                <span for="custom_switch_checkbox5"--}}
{{--                      class="bg-[#ebedf2] dark:bg-dark block h-full rounded-full before:absolute before:left-1 before:bg-white  dark:before:bg-white-dark dark:peer-checked:before:bg-white before:bottom-1 before:w-4 before:h-4 before:rounded-full peer-checked:before:left-7 peer-checked:bg-primary before:transition-all before:duration-300"></span>--}}
{{--            </label>--}}
{{--        </div>--}}
    </div>
</div>
