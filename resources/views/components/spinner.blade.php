<div wire:loading class="fixed top-0 left-0 flex h-screen w-screen items-center justify-center bg-gray-500/75" style="z-index: 100">
    <span class="loader"></span>
</div>

<style>
    .loader {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        position: relative;
        animation: rotate 1s linear infinite
    }

    .loader::before , .loader::after {
        content: "";
        box-sizing: border-box;
        position: absolute;
        inset: 0px;
        border-radius: 50%;
        border: 5px solid #FFF;
        animation: prixClipFix 2s linear infinite ;
    }

    .loader::after{
        inset: 8px;
        transform: rotate3d(90, 90, 0, 180deg );
        border-color: #5a76f3;
    }

    @keyframes rotate {
        0%   {transform: rotate(0deg)}
        100%   {transform: rotate(360deg)}
    }

    @keyframes prixClipFix {
        0%   {clip-path:polygon(50% 50%,0 0,0 0,0 0,0 0,0 0)}
        50%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 0,100% 0,100% 0)}
        75%, 100%  {clip-path:polygon(50% 50%,0 0,100% 0,100% 100%,100% 100%,100% 100%)}
    }
</style>