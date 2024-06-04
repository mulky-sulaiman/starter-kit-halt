<script type="text/javascript">
    // Used to add dark mode right away, adding here prevents any flicker
    if (typeof(Storage) !== "undefined") {
        if (localStorage.getItem('dark_mode') && localStorage.getItem('dark_mode') == 'true') {
            document.documentElement.classList.add('dark');
        }
    }
    // Confirm Dialog
    document.addEventListener('alpine:init', () => {
        Alpine.store('confirmDialog', () => ({
            type: 'warning',
            size: 'md',
            useIcon: true,
            headTitle: '{{ __('Confirmation Needed') }}',
            title: '{{ __('Are you sure you want to do this operation?') }}',
            message: '{{ __('Click OK to continue, or CANCEL to abort the operation') }}',
            useCancel: true,
            labelCancel: '{{ __('Cancel') }}',
            useOk: true,
            labelOk: '{{ __('OK') }}',
            placement: 'left',
            target: '',

            set(ty, s, uI, hT, ti, m, uC, lC, uO, lO, p, T) {
                if (ty && ty !== '') {
                    this.type = ty
                }
                if (s && s !== '') {
                    this.size = s
                }
                if (uI) {
                    this.useIcon = uI
                }
                if (hT && hT !== '') {
                    this.headTitle = hT
                }
                if (ti && ti !== '') {
                    this.title = ti
                }
                if (m && m !== '') {
                    this.message = m
                }
                if (uC) {
                    this.useCancel = uC
                }
                if (lC && lC !== '') {
                    this.labelCancel = lC
                }
                if (uO) {
                    this.useOk = uO
                }
                if (lO && lO !== '') {
                    this.labelOk = lO
                }
                if (p && p !== '') {
                    this.placement = p
                }
                if (T && T !== '') {
                    this.target = T
                }
            }
        }))

    })
</script>
