<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 10; $i++) { 
        DB::table('posts')->insert([
          'title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
          'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed bibendum magna non orci elementum tincidunt. Nulla facilisi. Fusce pretium mollis ante a congue. Donec sed iaculis nulla. Nunc mollis scelerisque velit nec pulvinar. Nam varius at justo sed convallis. Vivamus sit amet urna ut arcu pharetra vestibulum. Morbi eu ipsum nec justo mollis tempus. In hac habitasse platea dictumst. Donec non turpis pretium, pretium sapien id, tempus velit. Nam cursus diam vitae leo interdum, nec consequat leo aliquet. Duis id augue pulvinar, dictum velit at, ornare lacus. Vestibulum ac lacinia tellus. Mauris mattis, ligula at mattis euismod, ligula neque sagittis nisl, sed blandit dolor neque vel enim. Duis ac sapien nec lacus convallis elementum rutrum at dui.
  
          Mauris non venenatis turpis. Pellentesque in pharetra nunc. Vestibulum at vehicula enim. Sed nulla odio, convallis vitae nunc nec, laoreet egestas justo. Vivamus rhoncus dolor sit amet ex convallis rutrum. Donec condimentum lacus eget dolor pharetra cursus. Nunc sed nulla mi. Suspendisse mollis mauris in risus venenatis mollis. Sed non rhoncus magna.
          
          Sed et nunc eros. Mauris aliquet orci et eleifend placerat. Vestibulum et metus at mi gravida finibus vel vitae lacus. Nam lacinia diam nec hendrerit laoreet. Proin ac lectus eget augue hendrerit lacinia ac sit amet velit. Vestibulum euismod justo at felis posuere, ut aliquet nunc maximus. Sed porta tincidunt eros nec sollicitudin. Nunc rhoncus vulputate ex. Nam ultricies massa leo, in ullamcorper lorem interdum at. Proin vitae est et nunc molestie imperdiet at at orci. Fusce eget porttitor elit.',
          'thumbnail' => 'default-image.png',
          'user_id' => 1,
          'created_at' => Carbon::now(),
        ]);
      }
    }
}
