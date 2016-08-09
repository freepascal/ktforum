<?php

use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        define('title', 'title');
        define('slug', 'slug');
        define('body', 'body');
        define('category_id', 'category_id');
        define('user_id', 'user_id');
        define('is_sticked', 'is_sticked');
        define('is_locked', 'is_locked');

        DB::table('topics')->insert(array(
            array(
                title   => 'THE #1 FREE, OPEN SOURCE BULLETIN BOARD SOFTWARE',
                slug    => 'the-1-free-open-source-bulletin-board-software',
                body    => 'phpBB is a free flat-forum bulletin board software solution that can be used to stay in touch with a group of people or can power your entire website. With an extensive database of user-created modifications and styles database containing hundreds of style and image packages to customise your board, you can create a very unique forum in minutes.
No other bulletin board software offers a greater complement of features, while maintaining efficiency and ease of use. Best of all, phpBB is completely free. We welcome you to test it for yourself today. If you have any questions please visit our Community Forum where our staff and members of the community will be happy to assist you with anything from configuring the software to modifying the code for individual needs. Learn more about phpBB.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'phpBB 3.2 Rhea is near – help us test it now!',
                slug    => 'phpbb-3-2-rhea-is-near-help-us-test-it-now',
                body    => 'On October 28th, 2014, we published phpBB 3.1 Ascraeus, the culmination of nearly 8 years of development since phpBB 3.0—an eternity when it comes to web development. We learned our lesson from trying to build a major feature release over a timespan that saw major changes in web technologies; while our roadmap had to change frequently, none of the progress was made available to you—our users. When we finally released phpBB 3.1, I announced that phpBB would from now on see feature releases on an annual basis.
It has now been one year and 6 months since I made this statement. Our most recent release has been phpBB 3.2 Rhea 3.2.0 Beta2, on March 7th 2016. So we missed our goal, but we’re well on the way to reaching a new stable feature release before summer this year. We’ve been making great progress with tweaking our workflows to more strictly adhere to the schedule in the future.
As the Development Team Leader, I updated you much too infrequently on development progress, partly due to having many other tasks to also focus on. Unless you follow our development forums at Area51, or our social media accounts on Facebook or Twitter, you are unlikely to have heard of our recent 3.2 Beta releases. As these responsibilities exceed what a single person can do well, Marc Alexander stepped up in February to take over the Development Team Lead position. From now on, I will be responsible for more frequently informing you of all developments regarding phpBB, as its new Product Manager.
We are looking forward to your feedback on the Beta releases and upcoming final release candidates of phpBB 3.2 Rhea.We cannot produce a stable final product without your testing and bug reporting. Download Beta packages from our archive at https://download.phpbb.com/pub/release/3.2/unstable/3.2.0-b2/. Please keep in mind that you should not run this version of phpBB on your live sites yet, and no support will be offered until the RC phase.
If you’d like to get involved with phpBB development to help us finish new features faster, check out the information available on Area51. And lastly, if you’d like to stay up to date on phpBB development progress, follow this blog!
You can follow any responses to this entry through the RSS 2.0 feed. Both comments and pings are currently closed.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'AutoMOD',
                slug    => 'automod',
                body    => 'AutoMOD is a tool designed to parse and automatically install MODX MODifications for phpBB3. It also has the ability to uninstall MODs. It is a useful tool for MOD authors and end users alike: All MODs are installed with AutoMOD prior to being accepted in the MODs Database. As such, any MOD listed in the MOD Database should install with AutoMOD. Support for AutoMOD is available via the forums.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => '7 sai lầm khiến chúng ta vô tình tự huỷ hoại cuộc sống của mình...',
                slug    => '7-sai-lam-khien-chung-ta-vo-tinh-tu-huy-hoai-cuoc-song-cua-minh',
                body    => '<b>Các bạn biết đấy, cuộc sống chưa bao giờ là thẳng tắp cả. Chẳng có con đường cụ thể nào để giúp tất cả mọi người vượt qua nó theo một lịch trình y như nhau.</b>
Không ai ép buộc bạn hoàn thành việc học, phải xây dựng gia đình, hay bắt đầu sự nghiệp vào một độ tuổi nhất định nào đó. Bạn không nhất thiết phải kết hôn vào năm 25 tuổi, và rồi trở thành quản lí năm 30 tuổi. Bạn được phép nghỉ ngơi, được phép mặc kệ mọi thứ, nếu bạn muốn hoặc bạn cần làm thế. Bạn có quyền được tiêu tốn thời gian để tìm kiếm xem điều gì thực sự quan trọng với cuộc đời bạn, và với chính bản thân bạn.
Không quá ngạc nhiên khi chúng ta thường quên mất điều đó, bởi ai trong chúng ta cũng bị bắt phải lên kế hoạch cuộc đời ngay khi còn ngồi trên ghế nhà trường (Bạn biết tôi đang nói về cái gì mà: "Em muốn học ở ngôi trường này… Tôi muốn làm công việc này"). Có thể bạn chẳng yêu quý gì công việc của mình, nhưng bạn vẫn tới công ty đều đặn mỗi ngày, bởi vì bạn nghĩ, bạn phải hoàn thành thứ gọi là kế hoạch đó.
Bạn cứ lênh đênh mãi, cố gắng hoàn thành từng bước từng bước một trong kế hoạch, với niềm tin rằng nếu bạn làm theo đúng những gì bạn đã dự định trước nghĩa là bạn đang tiến gần hơn đến với hạnh phúc. Và rồi một sớm mai khi thức dậy, bạn cảm thấy thật mệt mỏi và buồn phiền. Bạn có cảm giác như thể đang bị một thứ gì đó đè nặng lên người, và bạn thậm chí còn chẳng biết vì sao. Đó là cách bạn hủy hoại cuộc đời mình. Và chúng ta đã làm thế, trong vô tình, bằng muôn vàn những cách khác nhau. ',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Bất ngờ trước chàng trai Việt làm phòng chơi game cực hoành với nửa tỷ đồng',
                slug    => 'bat-ngo-truoc-chang-trai-viet-lam-phong-choi-game-cuc-hoanh-voi-nua-ty-dong',
                body    => 'Đối với nhiều game thủ thì bên cạnh việc chinh chiến mượt mà trong thế giới ảo thì xây dựng một không gian thoải mái, phù hợp với ngồi chơi điện tử cũng vô cùng quan trọng. Để đạt được điều này thì việc xây dựng riêng một phòng chơi game là cách đơn giản, hiệu quả nhất.
Mới đây một chàng trai đến từ T.P. Hồ Chí Minh là Vĩnh Lộc đã khiến mọi người bất ngờ khi xây dựng cho riêng mình một căn phòng chơi game vô cùng hoành tráng và đẹp mắt. Anh chàng này đã tự lên ý tưởng, thiết kế cho phần trang trí và cậy nhờ Tomi Modder - chủ công ty xây dựng Đồng Tâm tiến hành thi công sao cho hợp lý nhất.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Vẻ đẹp siêu gợi cảm của mỹ nhân Harley Quinn đang khuấy đảo phòng vé',
                slug    => 've-dep-sieu-goi-cam-cua-my-nhan-harley-quinn-dang-khuay-dao-phong-ve',
                body    => 'Khi bộ phim "Suicide Squad" ra mắt cách đây không lâu, nhân vật được nhiều người quan tâm nhất có lẽ là Harley Quinn. Đây vốn là một trong những nhân vật nữ nổi tiếng nhất trong truyện tranh DC Comics. Trên phim "Suicide Squad", cô nàng xuất hiện cực kỳ nổi bật với hình ảnh vừa ngổ ngáo, vừa gợi cảm khó cưỡng. Hình ảnh cực "chất" này của Harley đã khiến các fan rất thích và thi nhau cosplay theo.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Hai Thế Giới',
                slug    => 'hai-the-gioi',
                body    => '“W - Hai Thế Giới” là một bộ phim buồn lãng mạn gay cấn lấy bối cảnh của Seoul vào năm 2016, sẽ bao quanh nhiều bối cảnh khác nhau, nơi mà các nhân vật có thể di chuyển được ở cả không gian thực tế lẫn phi thực tế. Một câu chuyện tình yêu giữa một cặp đôi đang ở trong độ đầu 30 tuổi. Đó là câu chuyện về hai người sống trong cùng một thời đại, nhưng trong thế giới khác nhau. Oh Yun Joo (Han Hyo Joo) là một bác sĩ phẫu thuật có cha là một người sáng tạo truyện tranh nổi tiếng. Một ngày nọ, cha cô bị mất tích và cô chạy đến xưởng của mình để tìm ông ấy, và thay vào đó cô đã tìm thấy một người đàn ông lạ, Kang Chul (Lee Jong Suk) đang đẫm trong biển máu. Anh đã bắt cóc cô và đưa cô đến 1 không gian khác.
Kang Chul là doanh nhân trẻ tự tay sáng lập công ty liên doanh trị giá 1,5 nghìn tỷ won, dù chưa bước sang tuổi 30 nhưng khối tài sản của chàng trai vừa đẹp vừa tài này đã lên đến 800 tỷ won. Năm 18 tuổi, Kang Chul đã từng đoạt cúp vô địch ở Thế vận hội. Thế nhưng, cậu đột ngột thay đổi con đường sự nghiệp khiến người hâm mộ ngỡ ngàng. Từ một vận động viên thể thao, Kang Chul quyết đổi hướng sang nghiên cứu khoa học máy tính và đã thành công.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Walmart is buying Jet.com for $3 billion',
                slug    => 'walmart-is-buying-jet-com-for-$3-billion',
                body    => 'Walmart is buying Jet.com in the largest e-commerce acquisition in history.
Walmart will pay about $3 billion in cash plus about $300 million of Walmart shares for the two-year-old e-commerce site.
"We\'re looking for ways to lower prices, broaden our assortment, and offer the simplest, easiest shopping experience because that\'s what our customers want," Walmart CEO Doug McMillon said in a statement.
Jet.com CEO and cofounder Marc Lore will continue to play a key role at the company, according to CNBC. He owns about a quarter of Jet.com and could make as much as $750 million from the deal, according to Recode.
"The combination of Walmart\'s retail expertise, purchasing scale, sourcing capabilities, distribution footprint, and digital assets — together with the team, technology, and business we have built here at Jet — will allow us to deliver more value to customers," Lore said in the statement.
He previously cofounded Quidsi, which runs the e-commerce sites Diapers.com, Soap.com, and Wag.com.
As Business Insider\'s Eugene Kim previously reported, the deal should help boost Walmart\'s online business, which has struggled to gain much traction against Amazon, the market leader. Walmart has generated about $14 billion in annual e-commerce sales, compared with Amazon\'s $99 billion in annual revenue.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Ai đang ấp ủ một chuyến đi Nhật đúng nghĩa, hãy tham khảo review của cô nàng này!',
                slug    => 'ai-dang-ap-u-mot-chuyen-di-nhat-dung-nghia-hay-tham-khao-review-cua-co-nang-nay',
                body    => 'Nhật Bản - với cảnh sắc đẹp như tranh vẽ, không khí bình yên và đặc thù văn hóa đặc sắc - từ lâu đã trở thành một địa điểm du lịch trong mơ của giới trẻ. Ai cũng bảo, đi Nhật khó lắm. Đúng là khó thật, nhưng một khi đã đi được rồi, thì đúng là chỉ muốn đi nữa, đi nữa mà thôi. Đó chính là cảm giác của cô nàng Dương Phương Thảo (sinh năm 1994, hiện là Freelancer Copywriter và Designer), người vừa trải qua 9 ngày hết sức "sung sướng" và tuyệt vời ở Nhật. Sau khi về Việt Nam, cô đã ngay lập tức viết hẳn 1 bài review khá dài trên Facebook của mình, thu hút nhiều sự chú ý của những tín đồ yêu nước Nhật.',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'Tuyển tập những ứng dụng, thủ thuật nổi bật tuần qua',
                slug    => 'tuyen-tap-nhung-ung-dung-thu-thuat-noi-bat-tuan-qua',
                body    => 'Sau một thời gian dài chờ đợi, tựa game đang “gây sốt” trên toàn cầu Pokemon GO đã chính thức được phát hành tại Việt Nam, cho phép các game thủ có thể cài đặt ứng dụng này lên smartphone của mình và lên đường tìm để bắt những chú Pokemon ở xung quanh khu vực mình đang ở.
Như vậy, Việt Nam là quốc gia thứ 3 sau thị trường Nhật Bản và Hồng Kông được chơi Pokemon GO tại Châu Á.
Người dùng Android có thể download tựa game này miễn phí tại đây hoặc tại đây (tương thích Android 4.4 trở lên). Trong khi đó người dùng iOS có thể download game miễn phí tại đây (tương thích iOS 8.0 trở lên).',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'This Birdhouse Will Give You Free Wi-Fi For Reducing Air Pollution',
                slug    => 'this-birdhouse-will-give-you-free-wi-fi-for-reducing-air-pollution',
                body    => '<p>Going green can be a rather thankless effort. Nobody pats you on the back for your reusable water bottle, diligent recycling efforts, and insistence on buying local. But one Dutch entrepreneur wants to reward residents of Amsterdam for their efforts to bring down air pollution. And he\'s doing it with birdhouses.</p>',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'TÁM GIAI ĐOẠN TU THÀNH PHẬT',
                slug    => 'tam-giai-doan-tu-thanh-phat',
                body    => 'Ngày đầu xuân là ngày mang tin vui lớn nhất đến cho chúng ta, bởi vì ngày này đức Phật tương lai Đại từ tôn Di Lặc đản sinh. Nhân đây, chúng tôi nêu lên những giai đoạn mà người con Phật phải trải qua trên bước đường tu tập.
Chúng ta biết không có vị Phật nào trong thời tu nhân mà chỉ nằm nghỉ, đi chơi, bách phố la cà khắp nơi, cuối cùng được thành Phật. Tất cả chư Phật đã thành, sẽ thành đều trải qua quá trình tu tập Phật đạo, siêng năng, tinh tấn bất thoái chuyển trong thời gian dài vô số kiếp. Các ngài đã sống trải, tu tập, phát nguyện, chịu tất cả sự khó khổ, gian nan nhất trên cuộc đời mới thành tựu Phật đạo. Thông thường chúng ta được học, trong vô số kiếp thứ nhất các ngài ở những vị Thập Tín, Thập Trụ, Thập Hạnh, Thập Hồi Hướng, đó là bốn mươi cấp căn bản. Đến vô số kiếp thứ hai từ Sơ Địa cho tới Bát Địa Bồ-tát. Vô số kiếp thứ ba từ Bát Địa cho đến Thập Địa, Đẳng Giác, Diệu Giác thành Phật.
Chúng ta bây giờ đang ở vô số kiếp thứ mấy, đã đi được bao nhiêu, tu tập ra sao? Không ai biết cả. Thỉnh thoảng có vị than tu hoài không thành Phật, dâng hương lễ Phật nói với Phật: “Bạch Ngài, con tu bao nhiêu năm rồi mà không thành Phật, cũng chẳng giác ngộ giải thoát. Những thứ bất như ý đầy dẫy, con làm sao giải tỏa được nó đây?” Như đã nói, chúng ta chưa biết mình ở vô số kiếp nào, trên quá trình từ nhân địa tới Phật đạo, do đó cần phải tự đả thông bằng đạo lý do chính mình thể nghiệm.
   Ở đây, chúng tôi nêu lên tám giai đoạn thể nghiệm để huynh đệ cùng chiêm nghiệm, chia sẻ trên bước đường tu học của chúng ta.
Tám giai đoạn đó thế này:',
                user_id => 1,
                category_id => 1
            ),
            array(
                title   => 'SỐNG ĐỂ LÀM GÌ?',
                slug    => 'song-de-lam-gi',
                body    => 'Như ai cũng biết, chúng ta sinh ra đời để sống và làm việc như bao nhiêu người trên thế gian này. Đó là ăn uống, ngủ nghỉ, rồi lớn lên lấy vợ lấy chồng, đi làm kiếm tiền nuôi bản thân, gia đình và đóng góp lợi ích xã hội, đến khi lớn tuổi về hưu thì già bệnh rồi chết. Đó là nói những người làm việc nhà nước có chính sách chế độ lương hưu. Còn những người tự làm tự sống, không làm việc nhà nước thì họ phải bươn chải đến khi không còn khả năng làm việc nữa mới thôi. Ai có phước thì được con cái chăm sóc, giúp đỡ, nuôi dưỡng khoảng đời còn lại.
Chúng ta ai cũng nghĩ ăn uống, ngủ nghỉ cho sướng cái thân, mình đi làm kiếm tiền cũng chỉ để nuôi sống bản thân và tìm kiếm sự sung sướng, hạnh phúc chứ không ai dại gì đi tìm nỗi bất hạnh, khổ đau. Trên đời này ai cũng mưu cầu hạnh phúc, từ kẻ cùng đinh hạ tiện cho tới vua chúa quan quyền, tổng thống, thủ tướng, giám đốc đến người làm công, ngay cả những người xuất gia đi tu cũng vì muốn tìm một sự an lạc, hạnh phúc chân thật. Cái bản năng đi tìm kiếm hạnh phúc này hình như đã ăn sâu vào trong tâm khảm của mỗi người.
Nhưng ít ai nghĩ rằng mọi người từ đâu đến, sinh ra đời để làm gì và sau khi chết sẽ đi về đâu? Một người bình thường sẽ trả lời: "Ta từ bụng mẹ chui ra, sinh ra đời để sống như bao người khác và chết thì trở về với cát bụi. Thế là hết một kiếp người!" Chúng ta mới nghe thấy dường như xuôi tai, nhưng thực tế không phải đơn giản như vậy. Chết không phải là hết mà chết chỉ thay hình đổi dạng tuỳ theo nghiệp nhân đã gieo tạo trong hiện tại mà cho ra kết quả ở tương lai. Chính vì vậy, ta phải sống làm sao ngay nơi cõi đời này để có được bình yên, hạnh phúc chân thật.
Có người đang học giữa chừng phải nghỉ học và bắt đầu đi làm việc để tìm kế sinh nhai. Có người được học tới nơi tới chốn rồi sau đó mới kiếm việc làm. Khi có công ăn việc làm ổn định thì chúng ta mới nghĩ đến chuyện cưới vợ, lấy chồng để xây dựng hạnh phúc gia đình. Ta sống với vợ hoặc chồng một thời gian cũng cảm thấy hạnh phúc nhưng đến lúc có con thì bắt đầu từ đó…. Có con rồi thì mọi việc lại khác đi, gánh nặng gia đình bắt đầu nhiều hơn với chuyện cơm áo gạo tiền, chuyện công ăn việc làm, chuyện ổn định đời sống gia đình cùng với nhiều nỗi lo toan khác. Cuối cùng, hạnh phúc có được chẳng bao nhiêu mà thấy toàn chuyện buồn phiền, thất vọng não nề bởi nhu cầu sống ngày càng cao mà khả năng làm ra tiền có giới hạn.
Cuộc đời có nhiều cái thật oái ăm! Chúng ta vì thấy biết sai lầm do si mê chấp ngã cho thân này là mình thiệt nên muốn chiếm hữu, từ đó ta mới hành động tạo nghiệp xấu ác và cuối cùng phải chịu quả khổ đau không có ngày thôi dứt. Muốn hết khổ thì chúng ta phải học hỏi và tu sửa. Tu là sửa và cũng có nghĩa là chuyển hoá hoặc thay đổi những thói quen xấu thành tốt. Muốn vậy, chúng ta phải có trí tuệ, muốn có trí tuệ thì chúng ta phải có thời gian để nghiệm xét, quán chiếu soi sáng thân tâm, hoàn cảnh để thấy tất cả đều vô thường. Nhờ vậy, ta mới dần hồi chuyển hoá tâm si mê chấp ngã.
Nhưng có nhiều người lại lầm tưởng rằng tu là tránh né, chạy trốn cuộc đời nên họ mới tìm một chỗ yên thân để tu tập chuyển hoá. Muốn tu hành trước tiên chúng ta cần phải có thầy lành bạn tốt hướng dẫn để tu tâm sửa tánh chứ không phải bỏ trốn lên rừng sâu núi thẳm. Sau một thời gian tu học, chúng ta cần phải đối diện, tiếp xúc với cuộc đời để phát triển khai mở tâm từ bi rộng lớn nhằm giúp đỡ, sẻ chia với mọi người khi có nhân duyên. Hoa sen không thể mọc và nở nơi thiên đường mà mọc ở nơi bùn lầy.
Chúng ta muốn hết phiền muộn, khổ đau thì phải tu, phải sửa, cái gì hư hỏng thì sửa lại cho tốt đẹp. Những gì có hình tướng thì ta sửa lại được, còn sửa tâm thì ta phải từ bỏ những tâm niệm xấu ác có tính cách làm tổn hại người vật. Cho nên, tu sửa như vậy còn được gọi là chuyển hóa; chuyển phiền não tham-sân-si thành vô thượng trí tuệ từ bi; chuyển bất hạnh, khổ đau thành an lạc, hạnh phúc ngay tại đây và bây giờ.
Mục đích của tu là sửa những thói quen xấu có hại cho mình và người. Cho nên, ta cần phải dùng pháp của Phật để chuyển hoá phiền não tham-sân-si bằng cách tụng kinh, sám hối, ngồi thiền, niệm Phật-Bồ tát, bố thí cúng dường, giúp đỡ sẻ chia với người bất hạnh rồi nghiệm xét, quán chiếu thân tâm, hoàn cảnh để thấy rõ tất cả đều vô thường.
Đọc tụng là bước đầu để hiểu lời Phật dạy, kế tiếp là chúng ta phải thực hành nhằm sửa đổi những cố tật phiền não tham lam, giận hờn, ích kỷ, ganh ghét, tật đố. Càng niệm Phật-Bồ tát tâm ta càng thanh tịnh, vắng lặng, không bị phiền não tham-sân-si làm xao xuyến, vọng động nên ta hãy siêng năng tinh tấn nhiều hơn. Càng tụng kinh ta càng hiểu đạo, bớt chấp trước, dính mắc, đắm nhiễm thì ta nên tụng kinh nhiều hơn nữa. Càng ngồi thiền chúng ta càng cảm thấy an lạc, hạnh phúc vì biết buông xả các tạp niệm xấu ác thì ta càng phải ngồi thiền nhiều hơn nữa.
Nhưng đọc kinh, niệm Phật-Bồ tát, niệm hơi thở, ngồi thiền chỉ là phương tiện buổi đầu, sau đó chúng ta cần dùng thiền quán để xem xét muôn loài vật mà biết rõ bản chất thật giả của thân tâm và hoàn cảnh, nhờ vậy ta dễ dàng buông xả mọi chấp trước ở đời. Sau khi đã thuần thục phép chỉ và quán, chúng ta quay lại chính mình để sống với Phật tính sáng suốt thường biết rõ ràng, nương nơi mắt-tai-mũi-lưỡi-thân-ý mà thành tựu đạo giác ngộ, giải thoát.
Con người là một chúng sinh có tình thức và sự hiểu biết, tức là có tình cảm, vì có tình cảm nên mới có buồn thương, giận ghét, phải quấy, tốt xấu, hơn thua. Trong nhà Phật thường nói đến ba nghiệp "thân-miệng-ý", gọi là ba cánh cửa tạo ra vận mệnh tốt xấu của chúng ta. Có ý nghĩ rồi phát sinh lời nói và dẫn đến hành động thiện cảm hay ghét bỏ. Chúng ta sẽ tu sửa ngay nơi ý nghĩ, lời nói và hành động của mình. Đây là cái gốc của sự tu hành chân chánh. Kính mong mọi người ai cũng ý thức được điều này để làm hành trang trên bước đường tu học của chính mình cho đến khi nào thành Phật viên mãn.',
                user_id  => 1,
                category_id => 1
            ),
            array(
                title   => 'TRUNG QUỐC PHÁ HỦY HỌC VIỆN PHẬT GIÁO TÂY TẠNG LỚN NHẤT THẾ GIỚI',
                slug    => 'trung-quoc-pha-huy-hoc-vien-phat-giao-tay-tang-lon-nhat-the-gioi',
                body    => 'Hôm 20/7 theo giờ Tây Tạng, chính quyền Trung Quốc đã bắt đầu phá dỡ phần lớn học viện Phật giáo Larung Gar tại Tây Tạng, Tứ xuyên, sớm hơn thông báo 5 ngày. Việc phá dỡ bắt đầu từ 8h sáng 20/7, từ những kiến trúc không nằm trong hồ sơ nhà ở được cho phép của chính phủ, một nhà sư thường trú giấu tên cho biết.
Larung Gar hiện là học viện Phật giáo đẹp và lớn nhất thế giới
Người này cho hay, ban lãnh đạo học viện kêu gọi tăng ni không phản đối hay cản trở việc phá dỡ của chính quyền.
“Chúng tôi không biết bao nhiêu ngôi nhà bị phá dỡ cũng như chúng tôi không được phép đến đó“, nguồn tin nói với RFA. “Tăng ni chúng tôi đang lo lắng nhưng chúng tôi không thể làm được gì“.
Theo kế hoạch ban đầu, đến 25/7 công việc phá dỡ mới bắt đầu từ các khu nhà của Chư Ni, đã có 9 khu bị đánh dấu phá bỏ, và sẽ kết thúc vào tháng 9/2017.
Trước đó ngày 8/6, chính quyền Trung Quốc thông báo kế hoạch giảm dân số tại học viện này. Đã có 60-70% ngôi nhà bị đánh dấu phá bỏ. Trong khi nơi đây hiện có khoảng 10.000 tăng ni thường trú, còn tạm trú có tới 40.000 người, nhưng chính quyền chỉ cho phép dân số 5.000 người.',
                user_id => 1,
                category_id => 1
            )
        ));
    }
}
