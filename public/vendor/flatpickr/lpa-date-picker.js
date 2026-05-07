(function () {
    window.lpaDatePicker = function ({ mode = 'date', defaultDate = null } = {}) {
        return {
            picker: null,

            init() {
                if (!window.flatpickr) return;

                const isMonth = mode === 'month';
                const plugins = [];

                if (isMonth && window.monthSelectPlugin) {
                    plugins.push(window.monthSelectPlugin({
                        shorthand: false,
                        dateFormat: 'Y-m',
                        altFormat: 'F Y',
                    }));
                }

                this.picker = window.flatpickr(this.$refs.input, {
                    allowInput: false,
                    altFormat: isMonth ? 'F Y' : 'd M Y',
                    dateFormat: isMonth ? 'Y-m' : 'Y-m-d',
                    defaultDate,
                    disableMobile: true,
                    plugins,
                });
            },

            destroy() {
                if (this.picker) this.picker.destroy();
            },
        };
    };
})();
