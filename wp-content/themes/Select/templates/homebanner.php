<div class="banner_wrap" style="background-image: url('<?php the_field('hero_image'); ?>');">
<div class="banner_dark">
  <div class="bannertype">
        <h1 class="scalableh1 white"><?php the_field('hero_title'); ?></h1>
        <p class="white"><?php the_field('hero_sub_title'); ?></p>
             
        <form id="contract_search" method="post" action="" name="contract_search">
          <div class="select_wrap">
          <label class="form_hidden">Search by:</label>
          <input id="searchby" name="searchby" type="text" value="Postcode" placeholder="Postcode" />
          </div>
          <div class="select_wrap">
          <label class="form_hidden">Distance of:</label>
          <select id="distance" name="distance">
             <option value="">Distance of</option>
             <option value="10 miles">10 miles</option>
             <option value="10 miles">20 miles</option>
             <option value="10 miles">30 miles</option>
             <option value="10 miles">40 miles</option>
             <option value="10 miles">50 miles</option>
             <option value="10 miles">60 miles</option>
             <option value="10 miles">70 miles</option>
             <option value="10 miles">80 miles</option>
             <option value="10 miles">90 miles</option>
             <option value="10 miles">100 miles</option>
          </select>
          </div>
          <div class="select_wrap">
          <label class="form_hidden">Group results by:</label>
          <select id="groupby" name="groupby">
             <option value="">Group results by</option>
             <option value="Distance">Distance</option>
             <option value="Town">Town</option>
             <option value="Value">Value</option>
          </select>
          </div>
          <div class="select_submit">
          <input id="submit" type="submit" value="Search" name="submit">
          </div>
        </form>
        
        <a class="scroll readmore" href="#whyuseselect"></a>
        
  </div>
</a>
</div>
</div>


