<div class="ibox">
    <div class="ibox-title">
        <h5>Cấu hình SEO</h5>
    </div>
    <div class="ibox-content">
        {{-- @include('admin.post.catalogue.component.general') --}}
        <div class="seo-container">
            <div class="meta-title">
                {{ (old('meta_title', ($postCatalogue->meta_title) ??'' )) ? old('meta_title', ($postCatalogue->meta_title) ??'' ) : 'Bạn chưa có tiêu đề SEO' }}
                {{-- {{ old('meta_title') ?? 'Bạn chưa có tiêu đề SEO' }} --}}
            </div>
            <div class="canonical">
                {{ (old('canonical', ($postCatalogue->canonical) ?? '')) ?
                config('app.url').old('canonical', ($postCatalogue->canonical) ?? '').config('apps.general.suffix') : 'https://duong-dan-cua-ban' }}

                {{-- {{ old('canonical') ?config('app.url').old('canonical').config('apps.general.suffix') : 'https://duong-dan-cua-ban' }} --}}
            </div>
            <div class="meta-description">
                {{ (old('meta_description',($postCatalogue->meta_description) ?? '')) ?old('meta_description',($postCatalogue->meta_description) ?? '') : 'Bạn cần mô tả SEO' }}
                {{-- {{ old('meta_description') ?? 'Bạn cần mô tả SEO' }} --}}
            </div>
        </div>

        <div class="seo-wraper">
            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-lable text-left">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <span>Tiêu đề SEO</span>
                                <span class="count_meta-title">
                                    0 ký tự
                                </span>
                            </div>
                        </label>
                        <input type="text" name="meta_title"
                            value="{{ old('meta_title', $postCatalogue->meta_title ?? '') }}" class="form-control"
                            placeholder="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-lable text-left">
                            Từ khóa SEO
                        </label>
                        <input type="text" name="meta_keyword"
                            value="{{ old('meta_keyword', $postCatalogue->meta_keyword ?? '') }}" class="form-control"
                            placeholder="" autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-lable text-left">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <span>Mô tả SEO</span>
                                <span class="count_meta-description">
                                    0 ký tự
                                </span>
                            </div>
                        </label>
                        <textarea type="text" name="meta_description" class="form-control" placeholder="" autocomplete="off">{{ old('meta_description', $postCatalogue->meta_description ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mb15">
                <div class="col-lg-12">
                    <div class="form-row">
                        <label for="" class="control-lable text-left">
                            <div class="uk-flex uk-flex-middle uk-flex-space-between">
                                <span>Đường dẫn</span>
                            </div>
                        </label>
                        <div class="input-wrapper">
                            <input type="text" name="canonical"
                                value="{{ old('canonical', $postCatalogue->canonical ?? '') }}" class="form-control"
                                placeholder="" autocomplete="off">
                            <span class="baseUrl">{{ config('app.url') }}</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
