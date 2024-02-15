<div class="container">
    <div class="row">
        <div class="col-lg-12 col-xs-12">
            <div class="marquee-container">
                <div class="marquee">
                    Chào mừng bạn đọc đến với thế giới <strong>TieuThuyet.VN</strong>. Trốn bao phiền muộn, đây là nơi bạn tìm
                    thấy giấc mơ của chính mình.
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const marqueeElement = document.querySelector('.marquee');

    // Lấy chiều rộng của marqueeElement
    const marqueeWidth = marqueeElement.offsetWidth;

    // Lấy chiều rộng của container
    const containerWidth = document.querySelector('.marquee-container').offsetWidth;

    // Tính toán tốc độ dựa trên tỷ lệ của container và marqueeElement
    const speed = marqueeWidth / containerWidth * 30; // 11s tương ứng với thời gian chạy

    // Áp dụng tốc độ vào keyframes
    document.styleSheets[0].insertRule(`@keyframes marquee { 0% { transform: translateX(100%); } 100% { transform: translateX(-${marqueeWidth}px); } }`, 0);
    document.styleSheets[0].insertRule(`.marquee { animation: marquee ${speed}s linear infinite; }`, 1);
});
</script>