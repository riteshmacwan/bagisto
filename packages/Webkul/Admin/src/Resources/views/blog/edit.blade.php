@php
    $currentLocale = core()->getRequestedLocale();
@endphp

<x-admin::layouts>
    <x-slot:title>
        @lang('admin::app.blog.edit.title')
    </x-slot:title>

    <x-admin::form
        :action="route('admin.blog.update', $blog->id)"
        method="PUT"
        enctype="multipart/form-data"
    >
        <div class="flex gap-[16px] justify-between items-center max-sm:flex-wrap">
            <p class="text-[20px] text-gray-800 dark:text-white font-bold">
                @lang('admin::app.blog.edit.title')
            </p>

            <div class="flex gap-x-[10px] items-center">
                <!-- Cancel Button -->
                <a
                    href="{{ route('admin.blog.index') }}"
                    class="transparent-button hover:bg-gray-200 dark:hover:bg-gray-800 dark:text-white "
                >
                    @lang('admin::app.blog.edit.back-btn')
                </a>


                {{--Save Button --}}
                <button
                    type="submit"
                    class="primary-button"
                >
                    @lang('admin::app.blog.edit.save-btn')
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
                        @lang('admin::app.blog.edit.description')
                    </p>

                    <x-admin::form.control-group class="mb-[10px]">
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.blog.edit.name')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="text"
                            name="name"
                            :value="old('name') ?? ($blog->name ?? '')"
                            id="name"
                            rules="required"
                            :label="trans('admin::app.blog.edit.name')"
                            :placeholder="trans('admin::app.blog.edit.name')"
                        >
                        </x-admin::form.control-group.control>

                        <x-admin::form.control-group.error
                            control-name="name"
                        >
                        </x-admin::form.control-group.error>
                    </x-admin::form.control-group>

                    <x-admin::form.control-group class="mb-[10px]">
                        <x-admin::form.control-group.label class="required">
                            @lang('admin::app.blog.edit.description')
                        </x-admin::form.control-group.label>

                        <x-admin::form.control-group.control
                            type="textarea"
                            name="description"
                            :value="old('description') ?? ($blog->description ?? '')"
                            id="description"
                            rules="required"
                            :label="trans('admin::app.blog.edit.description')"
                            :placeholder="trans('admin::app.blog.edit.description')"
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
