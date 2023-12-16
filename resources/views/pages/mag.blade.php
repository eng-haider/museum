@extends('layouts.layout')

@section('style-cu')
<style>

   .component {
    background: none !important;

  }
</style>
@endsection

@section('content')

<div class="px-4 py-2 bg-all">
    <h3 class="text-center  my-4" style="color: #303030;">{{__('home.body.magazine')}}</h3>
    <div class="container-fluid">
      <div class="row">
         <div class="col-md-12">
            <div class="component w-100">
            <ul class="align">
               <li>
               <figure class='book'>        
                  <!-- Front -->        
                  <ul class='hardcover_front'>
                     <li>
                     <img src="{{asset('assets/images/slides/a.jpg')}}" width="100%" height="100%">

                     <!-- <span class="ribbon new">الأول</span> -->
                     </li>
                     <li></li>
                  </ul>        
                  <!-- Pages -->        
                  <ul class='page'>
                  <li>
                        <img src="{{asset('assets/images/slides/d.jpg')}}" width="100%" height="100%">
                     </li>
                     <li>
                        <img src="{{asset('assets/images/slides/b.jpg')}}" width="100%" height="100%">
                     </li>
                     <li>
                        <img src="{{asset('assets/images/slides/c.jpg')}}" width="100%" height="100%">
                     </li>
                     <li>
                        <img src="{{asset('assets/images/slides/g.jpg')}}" width="100%" height="100%">
                     </li>
                     <li>
                        <img src="{{asset('assets/images/slides/d.jpg')}}" width="100%" height="100%">
                     </li>
                  </ul>        
                  <!-- Back -->        
                  <ul class='hardcover_back'>
                     <li></li>
                     <li></li>
                  </ul>
                  <ul class='book_spine'>
                     <li></li>
                     <li></li>
                  </ul>
                  <figcaption>
                     <h1>مجلة متحف الكفيل</h1>
                     <span>الأصدار الأول لمجلة المتحف</span>
                     <p>مجلة ثقافية نصف سنوية متخصصة بشؤون المتاحف و الاثار تصدر عن متحف الكفيل للنفائس و المخطوطات في العتبة العباسية المقدسة ، الغاية منها حفظ التراث و الموروث الإسلامي ، وتدوين مقتنيات المتحف الثمينة ، وزعت الموضوعات على أبواب متنوعة ، تقدم المجلة ملف العدد الذي يحتوي على عدة دراسات علمية لأقلام أكاديمية مهمة و أخبار و نشاطات و تقارير بالإضافة الى التراث العالمي و تقديم قراءات خاصة للكتب المتحفية و الحوارات الثقافية و المقالات الأدبية الخاصة بالمواقف و البطولات التأريخية التي تخص المولى ابي الفضل العباس عليه السلام .</p>
                        <a href="{{asset('upload/pdf/first.pdf')}}" download="first.pdf">   <button type="button" class="btn btn-warning mt-0 border-0 px-3 py-2">تحميل</button>
</a>
                  </figcaption>

               </figure>
               </li>
            </ul>  
            </div>
         </div>
        
       </div>
   </div>
    </div>

   <div class="d-flex justify-content-center my-5">
     <div class="mx-auto overflow-auto"  dir="ltr">

     </div>
   </div>


@endsection

