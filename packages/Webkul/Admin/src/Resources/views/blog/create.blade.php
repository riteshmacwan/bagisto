<x-admin::layouts>
    {{--Page title --}}
    <x-slot:title>
        @lang('admin::app.blog.create.title')
    </x-slot:title>

    {{--Create Page Form --}}
    <x-admin::form
        :action="route('admin.blog.store')"
        {{-- enctype="multipart/form-data" --}}
    >
        <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.blog.create.title')
            </p>


            <div class="flex gap-x-[10px] items-center">
                {{-- Back Button --}}
                <a
                    href="{{ route('admin.blog.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white "
                >
                    @lang('admin::app.account.edit.back-btn')
                </a>

                {{--Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('admin::app.blog.create.save-btn')
                </button>
            </div>
        </div>

        {{-- body content --}}
        <div class="flex gap-[10px] mt-[14px] max-xl:flex-wrap">
            {{-- Left sub-component --}}
            <div class=" flex flex-col gap-[8px] flex-1 max-xl:flex-auto">


                {{--Content --}}
                <div class="p-[16px] bg-white dark:bg-gray-900 rounded-[4px] box-shadow">
                    <p class="text-[16px] text-gray-800 dark:text-white font-semibold mb-[16px]">
                        @lang('admin::app.blog.create.general')
                    </p>

                    {{-- Name --}}
                    <x-admin::form.control-group class="mb-[10px]">
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.blog.create.name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="name"
                            :value="old('name')"
                            id="name"
                            rules="required"
                            :label="trans('admin::app.blog.create.name')"
                            :placeholder="trans('admin::app.blog.create.name')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="name"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    {{-- Description --}}
                    <x-admin::form.control-group class="mb-[10px]">
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.blog.create.description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="description"
                            :value="old('description')"
                            id="description"
                            rules="required"
                            rows="10"
                            :label="trans('admin::app.blog.create.description')"
                            :placeholder="trans('admin::app.blog.create.description')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="description"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>
                </div>
            </div>
        </div>
    </x-admin::form>
</x-admin::layouts>
