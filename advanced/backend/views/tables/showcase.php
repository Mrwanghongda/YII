<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="form-page">
            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span8 column">
                    <form />
                    <div class="field-box">
                        <label>Normal input:</label>
                        <input class="span8" type="text" />
                    </div>
                    <div class="field-box">
                        <label>Inline input:</label>
                        <input class="span8 inline-input" placeholder=".inline-input" type="text" />
                    </div>
                    <div class="field-box">
                        <label>Inline Password:</label>
                        <input class="span8 inline-input" type="password" value="blablabla" />
                    </div>
                    <div class="field-box">
                        <label>Read only:</label>
                        <input class="span8 inline-input" type="text" readonly="readonly" value="read only input" />
                    </div>
                    <div class="field-box">
                        <label>With tooltip:</label>
                        <input class="span8 inline-input" data-toggle="tooltip" data-trigger="focus" title="Please insert a valid email address" data-placement="right" type="text" />
                    </div>
                    <div class="field-box">
                        <label>Predefined value:</label>
                        <div class="predefined">
                            <span class="value">http://</span>
                            <input class="span8 inline-input" type="text" />
                        </div>
                    </div>
                    <div class="field-box">
                        <label>With max length:</label>
                        <input class="span8 inline-input" type="text" placeholder="max 20 characters here" maxlength="20" />
                    </div>
                    <div class="field-box">
                        <label>Textarea:</label>
                        <textarea class="span8" rows="4"></textarea>
                    </div>
                    <div class="field-box">
                        <label>Checkboxes:</label>
                        <label class="checkbox">
                            <input type="checkbox" /> Option 1
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" /> Option 2
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" /> Option 3
                        </label>
                    </div>
                    <div class="field-box">
                        <label>Radiobuttons:</label>
                        <div class="span8">
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="" />
                                Option one is this and that—be sure to include why it's great
                            </label>
                            <label class="radio">
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" />
                                Option two can be something else and selecting it will deselect option one
                            </label>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>Wysiwyg:</label>
                        <div class="wysi-column">
                            <textarea id="wysi" class="span10 wysihtml5" rows="5"></textarea>
                        </div>
                    </div>
                    </form>
                </div>

                <!-- right column -->
                <div class="span4 column pull-right">
                    <form />
                    <div class="field-box">
                        <label>Select:</label>
                        <div class="ui-select">
                            <select>
                                <option selected="" />Dropdown
                                <option />Custom selects
                                <option />Pure css styles
                            </select>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>Select2 plugin styled:</label>
                        <select style="width:250px" class="select2">
                            <option />
                            <option value="AK" />Alaska
                            <option value="HI" />Hawaii
                            <option value="CA" />California
                            <option value="NV" />Nevada
                            <option value="OR" />Oregon
                            <option value="WA" />Washington
                            <option value="AZ" />Arizona
                            <option value="CO" />Colorado
                            <option value="ID" />Idaho
                            <option value="MT" />Montana
                            <option value="NE" />Nebraska
                            <option value="NM" />New Mexico
                            <option value="ND" />North Dakota
                            <option value="UT" />Utah
                            <option value="WY" />Wyoming
                            <option value="AL" />Alabama
                            <option value="AR" />Arkansas
                            <option value="IL" />Illinois
                            <option value="IA" />Iowa
                            <option value="KS" />Kansas
                            <option value="KY" />Kentucky
                            <option value="LA" />Louisiana
                            <option value="MN" />Minnesota
                            <option value="MS" />Mississippi
                            <option value="MO" />Missouri
                            <option value="OK" />Oklahoma
                            <option value="SD" />South Dakota
                            <option value="TX" />Texas
                            <option value="TN" />Tennessee
                            <option value="WI" />Wisconsin
                            <option value="CT" />Connecticut
                            <option value="DE" />Delaware
                            <option value="FL" />Florida
                            <option value="GA" />Georgia
                            <option value="IN" />Indiana
                            <option value="ME" />Maine
                            <option value="MD" />Maryland
                            <option value="MA" />Massachusetts
                            <option value="MI" />Michigan
                            <option value="NH" />New Hampshire
                            <option value="NJ" />New Jersey
                            <option value="NY" />New York
                            <option value="NC" />North Carolina
                            <option value="OH" />Ohio
                            <option value="PA" />Pennsylvania
                            <option value="RI" />Rhode Island
                            <option value="SC" />South Carolina
                            <option value="VT" />Vermont
                            <option value="VA" />Virginia
                            <option value="WV" />West Virginia
                        </select>
                    </div>
                    <div class="field-box">
                        <label>Select2 multiselect:</label>
                        <select style="width:250px" multiple="" class="select2">
                            <option />
                            <option value="AK" />Alaska
                            <option value="HI" selected="" />Hawaii
                            <option value="CA" />California
                            <option value="NV" />Nevada
                            <option value="OR" />Oregon
                            <option value="WA" />Washington
                            <option value="AZ" />Arizona
                            <option value="CO" />Colorado
                            <option value="ID" />Idaho
                            <option value="MT" />Montana
                            <option value="NE" />Nebraska
                            <option value="NM" />New Mexico
                            <option value="ND" />North Dakota
                            <option value="UT" />Utah
                            <option value="WY" />Wyoming
                            <option value="AL" />Alabama
                            <option value="AR" />Arkansas
                            <option value="IL" />Illinois
                            <option value="IA" />Iowa
                            <option value="KS" />Kansas
                            <option value="KY" />Kentucky
                            <option value="LA" />Louisiana
                            <option value="MN" />Minnesota
                            <option value="MS" />Mississippi
                            <option value="MO" />Missouri
                            <option value="OK" />Oklahoma
                            <option value="SD" />South Dakota
                            <option value="TX" />Texas
                            <option value="TN" />Tennessee
                            <option value="WI" />Wisconsin
                            <option value="CT" />Connecticut
                            <option value="DE" />Delaware
                            <option value="FL" />Florida
                            <option value="GA" />Georgia
                            <option value="IN" />Indiana
                            <option value="ME" />Maine
                            <option value="MD" />Maryland
                            <option value="MA" />Massachusetts
                            <option value="MI" />Michigan
                            <option value="NH" />New Hampshire
                            <option value="NJ" />New Jersey
                            <option value="NY" />New York
                            <option value="NC" />North Carolina
                            <option value="OH" />Ohio
                            <option value="PA" />Pennsylvania
                            <option value="RI" />Rhode Island
                            <option value="SC" />South Carolina
                            <option value="VT" />Vermont
                            <option value="VA" />Virginia
                            <option value="WV" />West Virginia
                        </select>
                    </div>
                    <div class="field-box">
                        <label>Input prepend & append:</label>
                        <div class="input-prepend">
                            <span class="add-on">@</span>
                            <input class="input-large" type="text" />
                        </div>
                        <div class="input-append">
                            <input class="input-large" type="text" />
                            <span class="add-on">.00</span>
                        </div>
                    </div>
                    <div class="field-box">
                        <label>Datepicker:</label>
                        <input type="text" value="03/29/2014" class="input-large datepicker" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->