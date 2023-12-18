<x-admin::layouts>
    {{-- Title of the page --}}
    <x-slot:title>
        @lang('admin::app.test.index.title')
    </x-slot:title>

    <div class="flex justify-between items-center">
        <p class="text-[20px] text-gray-800 dark:text-white font-bold">
            @lang('admin::app.test.index.title')
        </p>

        <div class="flex gap-x-[10px] items-center">
            <!-- Dropdown -->
            <x-admin::dropdown position="bottom-right">
                <x-slot:toggle>
                    <span class="flex icon-setting p-[6px] rounded-[6px] text-[24px] cursor-pointer transition-all hover:bg-gray-200 dark:hover:bg-gray-800 "></span>
                </x-slot:toggle>

                <x-slot:content class="w-[174px] max-w-full !p-[8PX] border dark:border-gray-800 rounded-[4px] z-10 bg-white dark:bg-gray-900 shadow-[0px_8px_10px_0px_rgba(0,_0,_0,_0.2)]">
                    <div class="grid gap-[2px]">
                        <!-- Current Channel -->
                        <div class="p-[6px] items-center cursor-pointer transition-all hover:bg-gray-100 dark:hover:bg-gray-950 hover:rounded-[6px]">
                            <p class="text-gray-600 dark:text-gray-300  font-semibold leading-[24px]">
                                Channel - {{ core()->getCurrentChannel()->name }}
                            </p>
                        </div>

                        <!-- Current Locale -->
                        <div class="p-[6px] items-center cursor-pointer transition-all hover:bg-gray-100 dark:hover:bg-gray-950 hover:rounded-[6px]">
                            <p class="text-gray-600 dark:text-gray-300 font-semibold leading-[24px]">
                                Language - {{ core()->getCurrentLocale()->name }}
                            </p>
                        </div>
                    </div>
                </x-slot:content>
            </x-admin::dropdown>

            <!-- Export Modal -->


            {{-- Create New Pages Button --}}
            @if (bouncer()->hasPermission('test.create'))
                <a
                    href="{{ route('admin.test.create') }}"
                    class="primary-button"
                >
                    @lang('admin::app.test.index.create-btn')
                </a>
            @endif
        </div>
    </div>


    <x-admin::datagrid src="{{ route('admin.test.index') }}"></x-admin::datagrid>


</x-admin::layouts>
