
              {{-- Category Level --}}
              <div class="form-group">
                <label for="parent_id">Select Category Level</label>
                <select name="parent_id" id="parent_id" class="form-control">
                  <option value="0">Main Category</option>
                  
                @if (!empty($getCategories))
                @foreach ($getCategories as $parentcategory)
                  <option value="{{$parentcategory->id}}" @if (isset($category->parent_id) && $category->parent_id == $parentcategory->id) selected= '' @endif>{{$parentcategory->category_name}}</option>
                  {{-- subcategories --}}
                @if (!empty($parentcategory->subCategories))
                {{-- @dd($category) --}}
                @foreach ($parentcategory->subCategories as $subcategory)
                  <option value="{{$subcategory->id}}" @if (isset($subcategory->parent_id) && $subcategory->parent_id == $subcategory->id) selected= '' @endif>
                    &nbsp;&raquo;&nbsp;{{$subcategory->category_name}}</option> 
                @endforeach
                @endif
                @endforeach
                @endif

                

                </select>
                <span class="text-danger">@error('parent_id') {{$message}} @enderror</span>
            </div>