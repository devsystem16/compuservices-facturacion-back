(this["webpackJsonpreact-material-dashboard"] =
    this["webpackJsonpreact-material-dashboard"] || []).push([
    [0],
    {
        54: function (e) {
            e.exports = JSON.parse(
                '{"ATENCION AL PUBLICO":{"cliente":false,"fecha":false,"serie":false,"equipo":false,"marca":false,"modelo":false,"falla":false,"trabajo":true,"abono":false,"saldo":false,"total":false,"estadoEquipo":false,"observacion":true,"anular factura":false},"ADMINISTRADOR":{"cliente":true,"fecha":true,"serie":true,"equipo":true,"marca":true,"modelo":true,"falla":true,"trabajo":true,"abono":true,"saldo":false,"total":true,"estadoEquipo":true,"observacion":true,"anular factura":true},"TECNICO":{"cliente":false,"fecha":false,"serie":false,"equipo":false,"marca":false,"modelo":false,"falla":false,"trabajo":true,"abono":false,"saldo":false,"total":false,"estadoEquipo":false,"observacion":true,"anular factura":false}}'
            );
        },
        601: function (e, a, t) {},
        610: function (e, a, t) {},
        614: function (e, a, t) {
            "use strict";
            t.r(a);
            var n = t(0),
                r = t.n(n),
                l = t(24),
                c = t.n(l),
                o = t(37);
            Boolean(
                "localhost" === window.location.hostname ||
                    "[::1]" === window.location.hostname ||
                    window.location.hostname.match(
                        /^127(?:\.(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3}$/
                    )
            );
            t(449);
            var i = t(22),
                s = t(688),
                u = t(360),
                m = t(387),
                d = Object(u.a)(function () {
                    return Object(m.a)({
                        "@global": {
                            "*": {
                                boxSizing: "border-box",
                                margin: 0,
                                padding: 0,
                            },
                            html: {
                                "-webkit-font-smoothing": "antialiased",
                                "-moz-osx-font-smoothing": "grayscale",
                                height: "100%",
                                width: "100%",
                            },
                            body: {
                                backgroundColor: "#f4f6f8",
                                height: "100%",
                                width: "100%",
                            },
                            a: { textDecoration: "none" },
                            "#root": { height: "100%", width: "100%" },
                        },
                    });
                }),
                p = function () {
                    return d(), null;
                },
                g = t(128);
            g.Chart.helpers.extend(g.Chart.elements.Rectangle.prototype, {
                draw: function () {
                    var e,
                        a,
                        t,
                        n,
                        r,
                        l,
                        c,
                        o,
                        i = this._chart.ctx,
                        s = this._view,
                        u = s.borderWidth,
                        m = this._chart.config.options.cornerRadius;
                    if (
                        (m < 0 && (m = 0),
                        "undefined" === typeof m && (m = 0),
                        s.horizontal
                            ? ((e = s.base),
                              (a = s.x),
                              (t = s.y - s.height / 2),
                              (n = s.y + s.height / 2),
                              (r = a > e ? 1 : -1),
                              (l = 1),
                              (c = s.borderSkipped || "left"))
                            : ((e = s.x - s.width / 2),
                              (a = s.x + s.width / 2),
                              (t = s.y),
                              (r = 1),
                              (l = (n = s.base) > t ? 1 : -1),
                              (c = s.borderSkipped || "bottom")),
                        u)
                    ) {
                        var d = Math.min(Math.abs(e - a), Math.abs(t - n)),
                            p = (u = u > d ? d : u) / 2,
                            g = e + ("left" !== c ? p * r : 0),
                            b = a + ("right" !== c ? -p * r : 0),
                            f = t + ("top" !== c ? p * l : 0),
                            E = n + ("bottom" !== c ? -p * l : 0);
                        g !== b && ((t = f), (n = E)),
                            f !== E && ((e = g), (a = b));
                    }
                    i.beginPath(),
                        (i.fillStyle = s.backgroundColor),
                        (i.strokeStyle = s.borderColor),
                        (i.lineWidth = u);
                    var h = [
                            [e, n],
                            [e, t],
                            [a, t],
                            [a, n],
                        ],
                        v = ["bottom", "left", "top", "right"].indexOf(c, 0);
                    function x(e) {
                        return h[(v + e) % 4];
                    }
                    -1 === v && (v = 0);
                    var O = x(0);
                    i.moveTo(O[0], O[1]);
                    for (var j = 1; j < 4; j += 1) {
                        O = x(j);
                        var C = j + 1;
                        4 === C && (C = 0);
                        var y = h[2][0] - h[1][0],
                            w = h[0][1] - h[1][1],
                            S = h[1][0],
                            k = h[1][1];
                        if (
                            ((o = m) > Math.abs(w) / 2 &&
                                (o = Math.floor(Math.abs(w) / 2)),
                            o > Math.abs(y) / 2 &&
                                (o = Math.floor(Math.abs(y) / 2)),
                            w < 0)
                        ) {
                            var N = S,
                                I = S + y,
                                P = k + w,
                                T = k + w,
                                F = S,
                                _ = S + y,
                                A = k,
                                R = k;
                            i.moveTo(F + o, A),
                                i.lineTo(_ - o, R),
                                i.quadraticCurveTo(_, R, _, R - o),
                                i.lineTo(I, T + o),
                                i.quadraticCurveTo(I, T, I - o, T),
                                i.lineTo(N + o, P),
                                i.quadraticCurveTo(N, P, N, P + o),
                                i.lineTo(F, A - o),
                                i.quadraticCurveTo(F, A, F + o, A);
                        } else if (y < 0) {
                            var B = S + y,
                                D = S,
                                L = k,
                                M = k,
                                V = S + y,
                                z = S,
                                W = k + w,
                                U = k + w;
                            i.moveTo(V + o, W),
                                i.lineTo(z - o, U),
                                i.quadraticCurveTo(z, U, z, U - o),
                                i.lineTo(D, M + o),
                                i.quadraticCurveTo(D, M, D - o, M),
                                i.lineTo(B + o, L),
                                i.quadraticCurveTo(B, L, B, L + o),
                                i.lineTo(V, W - o),
                                i.quadraticCurveTo(V, W, V + o, W);
                        } else
                            i.moveTo(S + o, k),
                                i.lineTo(S + y - o, k),
                                i.quadraticCurveTo(S + y, k, S + y, k + o),
                                i.lineTo(S + y, k + w - o),
                                i.quadraticCurveTo(
                                    S + y,
                                    k + w,
                                    S + y - o,
                                    k + w
                                ),
                                i.lineTo(S + o, k + w),
                                i.quadraticCurveTo(S, k + w, S, k + w - o),
                                i.lineTo(S, k + o),
                                i.quadraticCurveTo(S, k, S + o, k);
                    }
                    i.fill(), u && i.stroke();
                },
            });
            var b = t(148),
                f = t(11),
                E = Object(b.a)({
                    palette: {
                        background: {
                            dark: "#F4F6F8",
                            default: f.a.common.white,
                            paper: f.a.common.white,
                        },
                        primary: { main: f.a.indigo[500] },
                        secondary: { main: f.a.indigo[500] },
                        text: {
                            primary: f.a.blueGrey[900],
                            secondary: f.a.blueGrey[600],
                        },
                    },
                    shadows: [
                        "none",
                        "0 0 0 1px rgba(63,63,68,0.05), 0 1px 2px 0 rgba(63,63,68,0.15)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 2px 2px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 3px 4px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 3px 4px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 4px 6px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 4px 6px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 4px 8px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 5px 8px -2px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 6px 12px -4px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 7px 12px -4px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 6px 16px -4px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 7px 16px -4px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 8px 18px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 9px 18px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 10px 20px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 11px 20px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 12px 22px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 13px 22px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 14px 24px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 16px 28px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 18px 30px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 20px 32px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 22px 34px -8px rgba(0,0,0,0.25)",
                        "0 0 1px 0 rgba(0,0,0,0.31), 0 24px 36px -8px rgba(0,0,0,0.25)",
                    ],
                    typography: {
                        h1: {
                            fontWeight: 500,
                            fontSize: 35,
                            letterSpacing: "-0.24px",
                        },
                        h2: {
                            fontWeight: 500,
                            fontSize: 29,
                            letterSpacing: "-0.24px",
                        },
                        h3: {
                            fontWeight: 500,
                            fontSize: 24,
                            letterSpacing: "-0.06px",
                        },
                        h4: {
                            fontWeight: 500,
                            fontSize: 20,
                            letterSpacing: "-0.06px",
                        },
                        h5: {
                            fontWeight: 500,
                            fontSize: 16,
                            letterSpacing: "-0.05px",
                        },
                        h6: {
                            fontWeight: 500,
                            fontSize: 14,
                            letterSpacing: "-0.05px",
                        },
                        overline: { fontWeight: 500 },
                    },
                }),
                h = t(4),
                v = t(29),
                x = t(7),
                O = t.n(x),
                j = t(10),
                C = t(63),
                y = t.n(C).a.create({
                    baseURL: "https://facturacion-binariosdrink.herokuapp.com/",
                }),
                w = Object(n.createContext)(),
                S = "api/usuarios/acceso/login",
                k = "api/pantallapos/acceso/obtener-acceso",
                N = function (e) {
                    var a = Object(n.useState)(!0),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)({
                            login: 0,
                            usuario: "",
                            nombres: "",
                            tipo: "",
                        }),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useState)({
                            avatar: "/static/images/avatars/avatar_6.png",
                            jobTitle: "Facturacion",
                            name: "Facturacion",
                        }),
                        f = Object(h.a)(b, 2),
                        E = f[0],
                        v = f[1];
                    Object(n.useEffect)(
                        function () {
                            null !== localStorage.getItem("tipousuario_id") &&
                                x(localStorage.getItem("tipousuario_id"));
                        },
                        [l]
                    );
                    var x = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.get(k + "/" + a)
                                                    );
                                                case 2:
                                                    (t = e.sent), u(t.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        C = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(S, a)
                                                    );
                                                case 2:
                                                    if (
                                                        1 !==
                                                        (t = e.sent).data.login
                                                    ) {
                                                        e.next = 7;
                                                        break;
                                                    }
                                                    return (
                                                        (e.next = 6),
                                                        x(t.data.tipousuario_id)
                                                    );
                                                case 6:
                                                    e.sent;
                                                case 7:
                                                    return e.abrupt(
                                                        "return",
                                                        t.data
                                                    );
                                                case 8:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            w.Provider,
                            {
                                value: {
                                    isReload: l,
                                    setIsReload: c,
                                    login: C,
                                    credenciales: p,
                                    setCredenciales: g,
                                    userloggin: E,
                                    setUserloggin: v,
                                    items: s,
                                },
                            },
                            e.children
                        )
                    );
                },
                I = t(615),
                P = t(619),
                T = t(55),
                F = t(565),
                _ = t(392),
                A = t(618),
                R = t(567),
                B = t(680),
                D = t(681),
                L = t(682),
                M = t(683),
                V = t(684),
                z = t(685),
                W = t(686),
                U = t(13),
                q = t(2),
                $ = t(391),
                Y = t(117),
                G = Object(u.a)(function (e) {
                    return {
                        item: {
                            display: "flex",
                            paddingTop: 0,
                            paddingBottom: 0,
                        },
                        button: {
                            color: e.palette.text.secondary,
                            fontWeight: e.typography.fontWeightMedium,
                            justifyContent: "flex-start",
                            letterSpacing: 0,
                            padding: "10px 8px",
                            textTransform: "none",
                            width: "100%",
                        },
                        icon: { marginRight: e.spacing(1) },
                        title: { marginRight: "auto" },
                        active: {
                            color: e.palette.primary.main,
                            "& $title": {
                                fontWeight: e.typography.fontWeightMedium,
                            },
                            "& $icon": { color: e.palette.primary.main },
                        },
                    };
                }),
                H = function (e) {
                    var a = e.className,
                        t = e.href,
                        n = e.icon,
                        l = e.title,
                        c = Object(U.a)(e, [
                            "className",
                            "href",
                            "icon",
                            "title",
                        ]),
                        i = G();
                    return r.a.createElement(
                        $.a,
                        Object.assign(
                            {
                                className: Object(q.a)(i.item, a),
                                disableGutters: !0,
                            },
                            c
                        ),
                        r.a.createElement(
                            Y.a,
                            {
                                activeClassName: i.active,
                                className: i.button,
                                component: o.c,
                                to: t,
                            },
                            n &&
                                r.a.createElement(n, {
                                    className: i.icon,
                                    size: "20",
                                }),
                            r.a.createElement("span", { className: i.title }, l)
                        )
                    );
                },
                X = Object(u.a)(function () {
                    return {
                        mobileDrawer: { width: 256 },
                        desktopDrawer: {
                            width: 256,
                            top: 64,
                            height: "calc(100% - 64px)",
                        },
                        avatar: { cursor: "pointer", width: 64, height: 64 },
                    };
                }),
                K = function (e) {
                    var a = e.onMobileClose,
                        t = e.openMobile,
                        l = Object(n.useContext)(w),
                        c = l.userloggin,
                        s = l.items,
                        u = X(),
                        m = Object(i.f)();
                    Object(n.useEffect)(
                        function () {
                            t && a && a();
                        },
                        [m.pathname]
                    );
                    var d = r.a.createElement(
                        I.a,
                        {
                            height: "100%",
                            display: "flex",
                            flexDirection: "column",
                        },
                        r.a.createElement(
                            I.a,
                            {
                                alignItems: "center",
                                display: "flex",
                                flexDirection: "column",
                                p: 2,
                            },
                            r.a.createElement(P.a, {
                                className: u.avatar,
                                component: o.b,
                                src: c.avatar,
                                to: "/app/account",
                            }),
                            r.a.createElement(
                                T.a,
                                {
                                    className: u.name,
                                    color: "textPrimary",
                                    variant: "h5",
                                },
                                "Facturacion" === c.name
                                    ? localStorage.getItem("nombres")
                                    : c.name
                            ),
                            r.a.createElement(
                                T.a,
                                { color: "textSecondary", variant: "body2" },
                                "Facturacion" === c.jobTitle
                                    ? localStorage.getItem("tipo_usuario")
                                    : c.jobTitle
                            )
                        ),
                        r.a.createElement(F.a, null),
                        r.a.createElement(
                            I.a,
                            { p: 2 },
                            r.a.createElement(
                                _.a,
                                null,
                                s.map(function (e) {
                                    return r.a.createElement(H, {
                                        href: e.href,
                                        key: e.title,
                                        title: e.title,
                                        icon:
                                            ((a = e.icon),
                                            "BarChartIcon" === a
                                                ? B.a
                                                : "Billing" === a
                                                ? D.a
                                                : "Smartphone" === a
                                                ? L.a
                                                : "UsersIcon" === a
                                                ? M.a
                                                : "ShoppingBagIcon" === a
                                                ? V.a
                                                : "EditIconF" === a
                                                ? z.a
                                                : "iconoFacturas" === a
                                                ? W.a
                                                : void 0),
                                    });
                                    var a;
                                })
                            )
                        ),
                        r.a.createElement(I.a, { flexGrow: 1 })
                    );
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            A.a,
                            { lgUp: !0 },
                            r.a.createElement(
                                R.a,
                                {
                                    anchor: "left",
                                    classes: { paper: u.mobileDrawer },
                                    onClose: a,
                                    open: t,
                                    variant: "temporary",
                                },
                                d
                            )
                        ),
                        r.a.createElement(
                            A.a,
                            { mdDown: !0 },
                            r.a.createElement(
                                R.a,
                                {
                                    anchor: "left",
                                    classes: { paper: u.desktopDrawer },
                                    open: !0,
                                    variant: "persistent",
                                },
                                d
                            )
                        )
                    );
                };
            K.defaultProps = { onMobileClose: function () {}, openMobile: !1 };
            var J = K,
                Z = t(568),
                Q = t(569),
                ee = t(136),
                ae = t(250),
                te = t(398),
                ne = t.n(te),
                re = t(397),
                le = t.n(re),
                ce = function (e) {
                    return r.a.createElement(
                        "img",
                        Object.assign(
                            { alt: "Logo", src: "public/static/logo.svg" },
                            e
                        )
                    );
                },
                oe = Object(u.a)(function () {
                    return { root: {}, avatar: { width: 60, height: 60 } };
                }),
                ie = function (e) {
                    var a = e.className,
                        t = e.onMobileNavOpen,
                        l = Object(U.a)(e, ["className", "onMobileNavOpen"]),
                        c = oe(),
                        i = Object(n.useState)([]),
                        s = Object(h.a)(i, 1)[0];
                    return r.a.createElement(
                        Z.a,
                        Object.assign(
                            { className: Object(q.a)(c.root, a), elevation: 0 },
                            l
                        ),
                        r.a.createElement(
                            Q.a,
                            null,
                            r.a.createElement(
                                o.b,
                                { to: "/app/dashboard" },
                                r.a.createElement(ce, null)
                            ),
                            r.a.createElement(I.a, { flexGrow: 1 }),
                            r.a.createElement(
                                A.a,
                                { mdDown: !0 },
                                r.a.createElement(
                                    ee.a,
                                    { color: "inherit" },
                                    r.a.createElement(ae.a, {
                                        badgeContent: s.length,
                                        color: "primary",
                                        variant: "dot",
                                    })
                                ),
                                r.a.createElement(
                                    ee.a,
                                    { color: "inherit" },
                                    r.a.createElement(
                                        o.b,
                                        {
                                            to: "/",
                                            alt: "Salir",
                                            title: "Salir",
                                            style: { color: "white" },
                                            onClick: function () {
                                                localStorage.removeItem(
                                                    "user_id"
                                                ),
                                                    localStorage.removeItem(
                                                        "tipo_usuario"
                                                    ),
                                                    localStorage.removeItem(
                                                        "nombres"
                                                    ),
                                                    localStorage.removeItem(
                                                        "tipousuario_id"
                                                    );
                                            },
                                        },
                                        r.a.createElement(le.a, null)
                                    )
                                )
                            ),
                            r.a.createElement(
                                A.a,
                                { lgUp: !0 },
                                r.a.createElement(
                                    ee.a,
                                    { color: "inherit", onClick: t },
                                    r.a.createElement(ne.a, null)
                                )
                            )
                        )
                    );
                },
                se = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            display: "flex",
                            height: "100%",
                            overflow: "hidden",
                            width: "100%",
                        },
                        wrapper: Object(v.a)(
                            {
                                display: "flex",
                                flex: "1 1 auto",
                                overflow: "hidden",
                                paddingTop: 64,
                            },
                            e.breakpoints.up("lg"),
                            { paddingLeft: 256 }
                        ),
                        contentContainer: {
                            display: "flex",
                            flex: "1 1 auto",
                            overflow: "hidden",
                        },
                        content: {
                            flex: "1 1 auto",
                            height: "100%",
                            overflow: "auto",
                        },
                    };
                }),
                ue = function () {
                    var e = se(),
                        a = Object(n.useState)(!1),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1];
                    return r.a.createElement(
                        "div",
                        { className: e.root },
                        r.a.createElement(ie, {
                            onMobileNavOpen: function () {
                                return c(!0);
                            },
                        }),
                        r.a.createElement(J, {
                            onMobileClose: function () {
                                return c(!1);
                            },
                            openMobile: l,
                        }),
                        r.a.createElement(
                            "div",
                            { className: e.wrapper },
                            r.a.createElement(
                                "div",
                                { className: e.contentContainer },
                                r.a.createElement(
                                    "div",
                                    { className: e.content },
                                    r.a.createElement(i.b, null)
                                )
                            )
                        )
                    );
                },
                me = Object(u.a)({ root: {}, toolbar: { height: 64 } }),
                de = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        n = me();
                    return r.a.createElement(
                        Z.a,
                        Object.assign(
                            { className: Object(q.a)(n.root, a), elevation: 0 },
                            t
                        ),
                        r.a.createElement(
                            Q.a,
                            { className: n.toolbar },
                            r.a.createElement(
                                o.b,
                                { to: "/" },
                                r.a.createElement(ce, null)
                            )
                        )
                    );
                },
                pe = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.default,
                            display: "flex",
                            height: "100%",
                            overflow: "hidden",
                            width: "100%",
                        },
                        wrapper: {
                            display: "flex",
                            flex: "1 1 auto",
                            overflow: "hidden",
                            paddingTop: 64,
                        },
                        contentContainer: {
                            display: "flex",
                            flex: "1 1 auto",
                            overflow: "hidden",
                        },
                        content: {
                            flex: "1 1 auto",
                            height: "100%",
                            overflow: "auto",
                        },
                    };
                }),
                ge = function () {
                    var e = pe();
                    return r.a.createElement(
                        "div",
                        { className: e.root },
                        r.a.createElement(de, null),
                        r.a.createElement(
                            "div",
                            { className: e.wrapper },
                            r.a.createElement(
                                "div",
                                { className: e.contentContainer },
                                r.a.createElement(
                                    "div",
                                    { className: e.content },
                                    r.a.createElement(i.b, null)
                                )
                            )
                        )
                    );
                },
                be = t(576),
                fe = t(575),
                Ee = t(399),
                he = Object(n.forwardRef)(function (e, a) {
                    var t = e.children,
                        n = e.title,
                        l = void 0 === n ? "" : n,
                        c = Object(U.a)(e, ["children", "title"]);
                    return r.a.createElement(
                        "div",
                        Object.assign({ ref: a }, c),
                        r.a.createElement(
                            Ee.a,
                            null,
                            r.a.createElement("title", null, l)
                        ),
                        t
                    );
                }),
                ve = t(51),
                xe = t.n(ve),
                Oe = t(571),
                je = t(572),
                Ce = t(573),
                ye = "/static/images/avatars/avatar_6.png",
                we = "Los Angeles",
                Se = "USA",
                ke = "Mychael Castro",
                Ne = "GTM-7",
                Ie = Object(u.a)(function () {
                    return { root: {}, avatar: { height: 100, width: 100 } };
                }),
                Pe = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        n = Ie();
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(n.root, a) }, t),
                        r.a.createElement(
                            je.a,
                            null,
                            r.a.createElement(
                                I.a,
                                {
                                    alignItems: "center",
                                    display: "flex",
                                    flexDirection: "column",
                                },
                                r.a.createElement(P.a, {
                                    className: n.avatar,
                                    src: ye,
                                }),
                                r.a.createElement(
                                    T.a,
                                    {
                                        color: "textPrimary",
                                        gutterBottom: !0,
                                        variant: "h3",
                                    },
                                    ke
                                ),
                                r.a.createElement(
                                    T.a,
                                    {
                                        color: "textSecondary",
                                        variant: "body1",
                                    },
                                    "".concat(we, " ").concat(Se)
                                ),
                                r.a.createElement(
                                    T.a,
                                    {
                                        className: n.dateText,
                                        color: "textSecondary",
                                        variant: "body1",
                                    },
                                    ""
                                        .concat(xe()().format("hh:mm A"), " ")
                                        .concat(Ne)
                                )
                            )
                        ),
                        r.a.createElement(F.a, null),
                        r.a.createElement(
                            Ce.a,
                            null,
                            r.a.createElement(
                                Y.a,
                                {
                                    color: "primary",
                                    fullWidth: !0,
                                    variant: "text",
                                },
                                "Upload picture"
                            )
                        )
                    );
                },
                Te = t(8),
                Fe = t(574),
                _e = t(251),
                Ae = [
                    { value: "alabama", label: "Alabama" },
                    { value: "new-york", label: "New York" },
                    { value: "san-francisco", label: "San Francisco" },
                ],
                Re = Object(u.a)(function () {
                    return { root: {} };
                }),
                Be = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Re(),
                        c = Object(n.useState)({
                            firstName: "Mychael",
                            lastName: "Castro",
                            email: "desarrollos16@hotmail.com",
                            phone: "",
                            state: "LATAM",
                            country: "ECU",
                        }),
                        o = Object(h.a)(c, 2),
                        i = o[0],
                        s = o[1],
                        u = function (e) {
                            s(
                                Object(Te.a)(
                                    Object(Te.a)({}, i),
                                    {},
                                    Object(v.a)(
                                        {},
                                        e.target.name,
                                        e.target.value
                                    )
                                )
                            );
                        };
                    return r.a.createElement(
                        "form",
                        Object.assign(
                            {
                                autoComplete: "off",
                                noValidate: !0,
                                className: Object(q.a)(l.root, a),
                            },
                            t
                        ),
                        r.a.createElement(
                            Oe.a,
                            null,
                            r.a.createElement(Fe.a, {
                                subheader: "The information can be edited",
                                title: "Profile",
                            }),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                je.a,
                                null,
                                r.a.createElement(
                                    fe.a,
                                    { container: !0, spacing: 3 },
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            helperText:
                                                "Please specify the first name",
                                            label: "First name",
                                            name: "firstName",
                                            onChange: u,
                                            required: !0,
                                            value: i.firstName,
                                            variant: "outlined",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            label: "Last name",
                                            name: "lastName",
                                            onChange: u,
                                            required: !0,
                                            value: i.lastName,
                                            variant: "outlined",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            label: "Email Address",
                                            name: "email",
                                            onChange: u,
                                            required: !0,
                                            value: i.email,
                                            variant: "outlined",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            label: "Phone Number",
                                            name: "phone",
                                            onChange: u,
                                            type: "number",
                                            value: i.phone,
                                            variant: "outlined",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            label: "Country",
                                            name: "country",
                                            onChange: u,
                                            required: !0,
                                            value: i.country,
                                            variant: "outlined",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        { item: !0, md: 6, xs: 12 },
                                        r.a.createElement(
                                            _e.a,
                                            {
                                                fullWidth: !0,
                                                label: "Select State",
                                                name: "state",
                                                onChange: u,
                                                required: !0,
                                                select: !0,
                                                SelectProps: { native: !0 },
                                                value: i.state,
                                                variant: "outlined",
                                            },
                                            Ae.map(function (e) {
                                                return r.a.createElement(
                                                    "option",
                                                    {
                                                        key: e.value,
                                                        value: e.value,
                                                    },
                                                    e.label
                                                );
                                            })
                                        )
                                    )
                                )
                            ),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                I.a,
                                {
                                    display: "flex",
                                    justifyContent: "flex-end",
                                    p: 2,
                                },
                                r.a.createElement(
                                    Y.a,
                                    { color: "primary", variant: "contained" },
                                    "Save details"
                                )
                            )
                        )
                    );
                },
                De = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                Le = function () {
                    var e = De();
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Account" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: "lg" },
                            r.a.createElement(
                                fe.a,
                                { container: !0, spacing: 3 },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 4, md: 6, xs: 12 },
                                    r.a.createElement(Pe, null)
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 8, md: 6, xs: 12 },
                                    r.a.createElement(Be, null)
                                )
                            )
                        )
                    );
                },
                Me = t(158),
                Ve = t.n(Me),
                ze = t(579),
                We = t(580),
                Ue = t(581),
                qe = t(582),
                $e = t(583),
                Ye = t(305),
                Ge =
                    (t(435),
                    Object(u.a)(function (e) {
                        return {
                            root: {},
                            avatar: { marginRight: e.spacing(2) },
                        };
                    }),
                    t(125)),
                He = t.n(Ge),
                Xe = t(52),
                Ke = t.n(Xe),
                Je = t(594),
                Ze = t(190),
                Qe = t(14),
                ea = t.n(Qe),
                aa = "api/clientes/listado/1000000",
                ta = "api/clientes",
                na = "api/clientes",
                ra = Object(n.createContext)(),
                la = function (e) {
                    var a = Object(n.useState)([]),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)(0),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useState)({
                            cedula: "",
                            nombres: "-SELECCIONE-",
                        }),
                        f = Object(h.a)(b, 2),
                        E = f[0],
                        v = f[1],
                        x = Object(n.useState)(!1),
                        C = Object(h.a)(x, 2),
                        w = C[0],
                        S = C[1],
                        k = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(aa)
                                                    );
                                                case 2:
                                                    (a = e.sent),
                                                        c(a.data),
                                                        u(a.data);
                                                case 5:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        N = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.get(na + "/" + a)
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        e.abrupt(
                                                            "return",
                                                            t.data
                                                        )
                                                    );
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        I = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.delete(
                                                            ta + "/" + p.id
                                                        )
                                                    );
                                                case 2:
                                                    if (
                                                        200 ===
                                                        (a = e.sent).data.estado
                                                    ) {
                                                        e.next = 6;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            a.data.mensaje,
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 6:
                                                    ea.a.success(
                                                        a.data.mensaje,
                                                        2
                                                    ),
                                                        k();
                                                case 8:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(function () {
                            k();
                        }, []),
                        r.a.createElement(
                            ra.Provider,
                            {
                                value: {
                                    clientes: l,
                                    currentCliente: E,
                                    setClientes: c,
                                    setCurrentCliente: v,
                                    isNewClient: w,
                                    setIsNewClient: S,
                                    filtrar: function (e) {
                                        console.log(e.target.value);
                                        var a = l.filter(function (a) {
                                            var t = a.nombres.toUpperCase(),
                                                n =
                                                    e.target.value.toUpperCase(),
                                                r = a.cedula.toUpperCase(),
                                                l =
                                                    e.target.value.toUpperCase(),
                                                c = a.telefono.toUpperCase(),
                                                o =
                                                    e.target.value.toUpperCase(),
                                                i = a.correo.toUpperCase(),
                                                s =
                                                    e.target.value.toUpperCase();
                                            return (
                                                t.indexOf(n) > -1 ||
                                                r.indexOf(l) > -1 ||
                                                c.indexOf(o) > -1 ||
                                                i.indexOf(s) > -1
                                            );
                                        });
                                        u(a);
                                    },
                                    clientesFiltro: s,
                                    setClientesFiltro: u,
                                    setDeleteCliente: g,
                                    deleteCliente: p,
                                    eliminarCliente: I,
                                    buscarCliente: N,
                                    cargarClientes: k,
                                },
                            },
                            e.children
                        )
                    );
                },
                ca = t(687),
                oa = Object(u.a)(function (e) {
                    return {
                        root: {},
                        marginRight: e.spacing(1),
                        importButton: { marginRight: e.spacing(1) },
                        exportButton: { marginRight: e.spacing(1) },
                    };
                }),
                ia = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = oa(),
                        c = Object(n.useState)({
                            eliminar: !1,
                            nuevoCliente: !1,
                        }),
                        o = Object(h.a)(c, 2),
                        i = o[0],
                        s = o[1],
                        u = Object(n.useContext)(ra),
                        m = u.setIsNewClient,
                        d = u.filtrar,
                        p = u.eliminarCliente,
                        g = u.deleteCliente;
                    Object(n.useEffect)(function () {
                        b();
                    }, []);
                    var b = function () {
                        null !== localStorage.getItem("tipo_usuario") &&
                            "ATENCION AL PUBLICO" ===
                                localStorage.getItem("tipo_usuario") &&
                            s(
                                Object(Te.a)(
                                    Object(Te.a)({}, i),
                                    {},
                                    { eliminar: !0 }
                                )
                            );
                    };
                    return r.a.createElement(
                        "div",
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            I.a,
                            { display: "flex", justifyContent: "flex-end" },
                            r.a.createElement(
                                Y.a,
                                {
                                    variant: "contained",
                                    style: {
                                        backgroundColor: "rgb(154, 0, 54)",
                                    },
                                    color: "secondary",
                                    className: l.exportButton,
                                    startIcon: r.a.createElement(He.a, null),
                                    disabled: i.eliminar,
                                    onClick: function () {
                                        void 0 !==
                                            (null === g || void 0 === g
                                                ? void 0
                                                : g.id) &&
                                            Ke.a
                                                .fire({
                                                    title: "\xbfEst\xe1 seguro de eliminar el cliente?",
                                                    showDenyButton: !0,
                                                    confirmButtonText:
                                                        "si, eliminar",
                                                    denyButtonText: "Cancelar",
                                                })
                                                .then(
                                                    (function () {
                                                        var e = Object(j.a)(
                                                            O.a.mark(function e(
                                                                a
                                                            ) {
                                                                return O.a.wrap(
                                                                    function (
                                                                        e
                                                                    ) {
                                                                        for (;;)
                                                                            switch (
                                                                                (e.prev =
                                                                                    e.next)
                                                                            ) {
                                                                                case 0:
                                                                                    a.isConfirmed &&
                                                                                        p();
                                                                                case 1:
                                                                                case "end":
                                                                                    return e.stop();
                                                                            }
                                                                    },
                                                                    e
                                                                );
                                                            })
                                                        );
                                                        return function (a) {
                                                            return e.apply(
                                                                this,
                                                                arguments
                                                            );
                                                        };
                                                    })()
                                                );
                                    },
                                },
                                "Eliminar"
                            ),
                            r.a.createElement(
                                Y.a,
                                {
                                    color: "primary",
                                    variant: "contained",
                                    onClick: function () {
                                        return m(!0);
                                    },
                                },
                                "Nuevo Cliente"
                            )
                        ),
                        r.a.createElement(
                            I.a,
                            { mt: 3 },
                            r.a.createElement(
                                Oe.a,
                                null,
                                r.a.createElement(
                                    je.a,
                                    null,
                                    r.a.createElement(
                                        I.a,
                                        { maxWidth: 500 },
                                        r.a.createElement(_e.a, {
                                            fullWidth: !0,
                                            onChange: d,
                                            InputProps: {
                                                startAdornment:
                                                    r.a.createElement(
                                                        Je.a,
                                                        { position: "start" },
                                                        r.a.createElement(
                                                            Ze.a,
                                                            {
                                                                fontSize:
                                                                    "small",
                                                                color: "action",
                                                            },
                                                            r.a.createElement(
                                                                ca.a,
                                                                null
                                                            )
                                                        )
                                                    ),
                                            },
                                            placeholder: "Buscar Cliente",
                                            variant: "outlined",
                                        })
                                    )
                                )
                            )
                        )
                    );
                },
                sa = t(691),
                ua = [
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "West Virginia",
                            city: "Parkersburg",
                            street: "2849 Fulton Street",
                        },
                        avatarUrl: "/static/images/avatars/avatar_3.png",
                        createdAt: 15550164e5,
                        email: "ekaterina.tankova@devias.io",
                        name: "Ekaterina Tankova",
                        phone: "304-428-3097",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Bristow",
                            city: "Iowa",
                            street: "1865  Pleasant Hill Road",
                        },
                        avatarUrl: "/static/images/avatars/avatar_4.png",
                        createdAt: 15550164e5,
                        email: "cao.yu@devias.io",
                        name: "Cao Yu",
                        phone: "712-351-5711",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Georgia",
                            city: "Atlanta",
                            street: "4894  Lakeland Park Drive",
                        },
                        avatarUrl: "/static/images/avatars/avatar_2.png",
                        createdAt: 15550164e5,
                        email: "alexa.richardson@devias.io",
                        name: "Alexa Richardson",
                        phone: "770-635-2682",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Ohio",
                            city: "Dover",
                            street: "4158  Hedge Street",
                        },
                        avatarUrl: "/static/images/avatars/avatar_5.png",
                        createdAt: 155493e7,
                        email: "anje.keizer@devias.io",
                        name: "Anje Keizer",
                        phone: "908-691-3242",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Texas",
                            city: "Dallas",
                            street: "75247",
                        },
                        avatarUrl: "/static/images/avatars/avatar_6.png",
                        createdAt: 15547572e5,
                        email: "clarke.gillebert@devias.io",
                        name: "Clarke Gillebert",
                        phone: "972-333-4106",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "California",
                            city: "Bakerfield",
                            street: "317 Angus Road",
                        },
                        avatarUrl: "/static/images/avatars/avatar_1.png",
                        createdAt: 15546708e5,
                        email: "adam.denisov@devias.io",
                        name: "Adam Denisov",
                        phone: "858-602-3409",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "California",
                            city: "Redondo Beach",
                            street: "2188  Armbrester Drive",
                        },
                        avatarUrl: "/static/images/avatars/avatar_7.png",
                        createdAt: 15543252e5,
                        email: "ava.gregoraci@devias.io",
                        name: "Ava Gregoraci",
                        phone: "415-907-2647",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Nevada",
                            city: "Las Vegas",
                            street: "1798  Hickory Ridge Drive",
                        },
                        avatarUrl: "/static/images/avatars/avatar_8.png",
                        createdAt: 15230484e5,
                        email: "emilee.simchenko@devias.io",
                        name: "Emilee Simchenko",
                        phone: "702-661-1654",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Michigan",
                            city: "Detroit",
                            street: "3934  Wildrose Lane",
                        },
                        avatarUrl: "/static/images/avatars/avatar_9.png",
                        createdAt: 15547028e5,
                        email: "kwak.seong.min@devias.io",
                        name: "Kwak Seong-Min",
                        phone: "313-812-8947",
                    },
                    {
                        id: Object(sa.a)(),
                        address: {
                            country: "USA",
                            state: "Utah",
                            city: "Salt Lake City",
                            street: "368 Lamberts Branch Road",
                        },
                        avatarUrl: "/static/images/avatars/avatar_10.png",
                        createdAt: 15227028e5,
                        email: "merrile.burgett@devias.io",
                        name: "Merrile Burgett",
                        phone: "801-301-7894",
                    },
                ],
                ma = t(33),
                da = Object(n.createContext)(),
                pa = "api/reporte/ventas",
                ga = "api/reporte/historicofacturas",
                ba = "api/reporte/historicofacturas-filter",
                fa = "api/facturas/anulacion/nota-credito",
                Ea = function (e) {
                    var a = Object(n.useState)(!0),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)({
                            numeroFacturas: 0,
                            numeroCreditos: 0,
                            clientes: 0,
                            totalVentas: 0,
                            desglose: [],
                        }),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1];
                    Object(n.useEffect)(
                        function () {
                            l &&
                                (console.log("RELOAD ESTADISTICAS"),
                                b(),
                                v(),
                                c(!1));
                        },
                        [l]
                    );
                    var b = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(ga)
                                                    );
                                                case 2:
                                                    (a = e.sent), u(a.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        f = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(fa, {
                                                            idFactura: a,
                                                        })
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        e.abrupt(
                                                            "return",
                                                            t.data
                                                        )
                                                    );
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        E = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(ba, {
                                                            filter: a,
                                                        })
                                                    );
                                                case 2:
                                                    (t = e.sent), u(t.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        v = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(pa)
                                                    );
                                                case 2:
                                                    (a = e.sent),
                                                        g({
                                                            numeroFacturas:
                                                                a.data
                                                                    .NumeroFacturas,
                                                            numeroCreditos:
                                                                a.data
                                                                    .NumeroCreditos,
                                                            stockBajo:
                                                                a.data
                                                                    .productosStockBajo,
                                                            clientes:
                                                                a.data.clientes,
                                                            totalVentas:
                                                                a.data
                                                                    .totalVendido,
                                                            desglose:
                                                                a.data.desglose,
                                                        });
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            da.Provider,
                            {
                                value: {
                                    isReload: l,
                                    setIsReload: c,
                                    reporte: p,
                                    historicofacturas: s,
                                    cargarHistoricoFacturasFilter: E,
                                    fn_anularFactura: f,
                                },
                            },
                            e.children
                        )
                    );
                },
                ha = t(299),
                va = t(407),
                xa = Object(u.a)(function (e) {
                    return {
                        root: { "& > *": { margin: e.spacing(1) } },
                        importButton: { marginRight: e.spacing(1) },
                        exportButton: { marginRight: e.spacing(1) },
                    };
                }),
                Oa = "api/clientes",
                ja = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = xa(),
                        c = Object(n.useContext)(ra),
                        o = c.setIsNewClient,
                        i = c.setClientes,
                        s = c.clientes,
                        u = c.setClientesFiltro,
                        m = Object(n.useContext)(da).setIsReload,
                        d = Object(n.useState)(""),
                        p = Object(h.a)(d, 2),
                        g = p[0],
                        b = p[1],
                        f = Object(n.useState)(""),
                        E = Object(h.a)(f, 2),
                        v = E[0],
                        x = E[1],
                        C = Object(n.useState)(""),
                        w = Object(h.a)(C, 2),
                        S = w[0],
                        k = w[1],
                        N = Object(n.useState)(""),
                        P = Object(h.a)(N, 2),
                        T = P[0],
                        F = P[1],
                        _ = Object(n.useState)(""),
                        A = Object(h.a)(_, 2),
                        R = A[0],
                        B = A[1],
                        D = Object(n.useState)(""),
                        L = Object(h.a)(D, 2),
                        M = L[0],
                        V = L[1],
                        z = Object(n.useState)(!1),
                        W = Object(h.a)(z, 2),
                        $ = W[0],
                        G = W[1],
                        H = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a, t, n, r, l, c;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    if ("" !== g) {
                                                        e.next = 3;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "La c\xe9dula es obligatoria",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 3:
                                                    if ("" !== v) {
                                                        e.next = 6;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "Los nombres son obligatorios",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 6:
                                                    return (
                                                        "" === (a = S) &&
                                                            (a = "-"),
                                                        "" === (t = T) &&
                                                            (t = "-"),
                                                        "" === (n = R) &&
                                                            (n = "-"),
                                                        "" === (r = M) &&
                                                            (r = "-"),
                                                        G(!0),
                                                        (l = {
                                                            cedula: g,
                                                            nombres: v,
                                                            telefono: a,
                                                            direccion: t,
                                                            correo: n,
                                                            observacion: r,
                                                        }),
                                                        (e.next = 15),
                                                        y.post(Oa, l)
                                                    );
                                                case 15:
                                                    if (
                                                        ((c = e.sent),
                                                        G(!1),
                                                        201 === c.data.estado)
                                                    ) {
                                                        e.next = 20;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            c.data.mensaje,
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 20:
                                                    m(!0),
                                                        b(""),
                                                        x(""),
                                                        k(""),
                                                        F(""),
                                                        B(""),
                                                        V(""),
                                                        i(
                                                            [
                                                                c.data.cliente,
                                                            ].concat(
                                                                Object(ma.a)(s)
                                                            )
                                                        ),
                                                        u(
                                                            [
                                                                c.data.cliente,
                                                            ].concat(
                                                                Object(ma.a)(s)
                                                            )
                                                        ),
                                                        o(!1);
                                                case 30:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return r.a.createElement(
                        "div",
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            I.a,
                            { mt: 3 },
                            r.a.createElement(
                                Oe.a,
                                null,
                                r.a.createElement(
                                    je.a,
                                    { className: l.root },
                                    r.a.createElement(
                                        "h2",
                                        null,
                                        " Nuevo cliente"
                                    ),
                                    r.a.createElement(ha.a, {
                                        defaultValue: g,
                                        onChange: function (e) {
                                            return b(e.target.value);
                                        },
                                        placeholder: "C\xe9dula",
                                        inputProps: {
                                            "aria-label": "C\xe9dula",
                                        },
                                    }),
                                    r.a.createElement(ha.a, {
                                        defaultValue: v,
                                        onChange: function (e) {
                                            return x(e.target.value);
                                        },
                                        placeholder: "Nombres",
                                        inputProps: { "aria-label": "Nombres" },
                                    }),
                                    r.a.createElement(ha.a, {
                                        defaultValue: S,
                                        onChange: function (e) {
                                            return k(e.target.value);
                                        },
                                        placeholder: "Tel\xe9fono",
                                        inputProps: {
                                            "aria-label": "Tel\xe9fono",
                                        },
                                    }),
                                    r.a.createElement("br", null),
                                    r.a.createElement(ha.a, {
                                        defaultValue: T,
                                        onChange: function (e) {
                                            return F(e.target.value);
                                        },
                                        placeholder: "Direcci\xf3n",
                                        inputProps: {
                                            "aria-label": "Direcci\xf3n",
                                        },
                                    }),
                                    r.a.createElement(ha.a, {
                                        defaultValue: R,
                                        onChange: function (e) {
                                            return B(e.target.value);
                                        },
                                        placeholder: "Correo",
                                        inputProps: { "aria-label": "Correo" },
                                    }),
                                    r.a.createElement(ha.a, {
                                        defaultValue: R,
                                        onChange: function (e) {
                                            return V(e.target.value);
                                        },
                                        placeholder: "Observaci\xf3n",
                                        inputProps: {
                                            "aria-label": "Observaci\xf3n",
                                        },
                                    })
                                ),
                                r.a.createElement(
                                    I.a,
                                    {
                                        display: "flex",
                                        justifyContent: "flex-end",
                                    },
                                    $ ? r.a.createElement(va.a, null) : null,
                                    r.a.createElement(
                                        Y.a,
                                        {
                                            style: {
                                                backgroundColor:
                                                    "rgb(220, 0, 78)",
                                                color: "white",
                                            },
                                            variant: "contained",
                                            onClick: function () {
                                                return o(!1);
                                            },
                                        },
                                        "Cancelar"
                                    ),
                                    r.a.createElement(
                                        Y.a,
                                        {
                                            color: "primary",
                                            variant: "contained",
                                            onClick: H,
                                        },
                                        "Guardar Cliente"
                                    )
                                )
                            )
                        )
                    );
                },
                Ca = t(408),
                ya = t(160),
                wa = t(199),
                Sa = [
                    { field: "id", headerName: "ID", width: 90, visible: !1 },
                    {
                        field: "cedula",
                        headerName: "C\xe9dula",
                        width: 130,
                        editable: !0,
                    },
                    {
                        field: "nombres",
                        headerName: "Nombres",
                        width: 300,
                        editable: !0,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "correo",
                        headerName: "Correo",
                        width: 250,
                        editable: !0,
                    },
                    {
                        field: "telefono",
                        headerName: "Tel\xe9fono",
                        width: 250,
                        editable: !0,
                    },
                    {
                        field: "direccion",
                        headerName: "Direcci\xf3n",
                        width: 400,
                        editable: !0,
                    },
                    {
                        field: "observacion",
                        headerName: "Observaci\xf3n",
                        width: 350,
                        editable: !0,
                    },
                ],
                ka = "api/clientes";
            function Na(e) {
                Object(Ca.a)(e);
                var a = n.useState(!1),
                    t = Object(h.a)(a, 2),
                    r = t[0],
                    l = t[1],
                    c = n.useContext(ra),
                    o = c.clientes,
                    i = c.clientesFiltro,
                    s = c.setClientes,
                    u = c.setDeleteCliente,
                    m = c.cargarClientes;
                n.useEffect(function () {
                    m();
                }, []);
                var d = (function () {
                    var e = Object(j.a)(
                        O.a.mark(function e(a) {
                            var t;
                            return O.a.wrap(function (e) {
                                for (;;)
                                    switch ((e.prev = e.next)) {
                                        case 0:
                                            return (
                                                l(!0),
                                                (e.next = 3),
                                                y.patch(ka + "/" + a.id, a)
                                            );
                                        case 3:
                                            (t = e.sent),
                                                l(!1),
                                                ea.a.success("Actualizado", 2),
                                                console.log(t);
                                        case 7:
                                        case "end":
                                            return e.stop();
                                    }
                            }, e);
                        })
                    );
                    return function (a) {
                        return e.apply(this, arguments);
                    };
                })();
                return n.createElement(
                    Oe.a,
                    null,
                    n.createElement(
                        "div",
                        { style: { height: 360, width: "100%" } },
                        n.createElement(ya.a, {
                            rows: i,
                            columns: Sa,
                            datasets: "Commodity",
                            checkboxSelection: !1,
                            onEditCellChangeCommitted: function (e) {
                                if (e.id) {
                                    var a = e.field,
                                        t = [],
                                        n = o.map(function (n) {
                                            return n.id === e.id
                                                ? ("correo" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              correo: e.props
                                                                  .value,
                                                          }
                                                      )),
                                                  "cedula" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              cedula: e.props
                                                                  .value,
                                                          }
                                                      )),
                                                  "nombres" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              nombres:
                                                                  e.props.value,
                                                          }
                                                      )),
                                                  "telefono" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              telefono:
                                                                  e.props.value,
                                                          }
                                                      )),
                                                  "direccion" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              direccion:
                                                                  e.props.value,
                                                          }
                                                      )),
                                                  "observacion" === a &&
                                                      (t = Object(Te.a)(
                                                          Object(Te.a)({}, n),
                                                          {},
                                                          {
                                                              observacion:
                                                                  e.props.value,
                                                          }
                                                      )),
                                                  d(t),
                                                  t)
                                                : n;
                                        });
                                    s(n);
                                }
                            },
                            pageSize: 10,
                            disableSelectionOnClick: !1,
                            rowHeight: 23,
                            onRowSelected: function (e) {
                                u(e.data);
                            },
                            loading: r,
                        })
                    )
                );
            }
            var Ia = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                Pa = function () {
                    var e = Object(n.useContext)(ra),
                        a = e.isNewClient,
                        t = (e.clientes, e.clientesFiltro, e.setClientes, Ia()),
                        l = Object(n.useState)(ua);
                    Object(h.a)(l, 1)[0];
                    return r.a.createElement(
                        he,
                        { className: t.root, title: "Clientes" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: !1 },
                            a
                                ? r.a.createElement(ja, null)
                                : r.a.createElement(ia, null),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(Na, null)
                            )
                        )
                    );
                },
                Ta = t(414),
                Fa = t.n(Ta),
                _a = Object(u.a)(function (e) {
                    return {
                        root: { height: "100%" },
                        avatar: {
                            backgroundColor: f.a.red[600],
                            height: 56,
                            width: 56,
                        },
                        differenceIcon: { color: f.a.red[900] },
                        differenceValue: {
                            color: f.a.red[900],
                            marginRight: e.spacing(1),
                        },
                    };
                }),
                Aa = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = _a(),
                        c = Object(n.useContext)(da).reporte;
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            je.a,
                            null,
                            r.a.createElement(
                                fe.a,
                                {
                                    container: !0,
                                    justify: "space-between",
                                    spacing: 3,
                                },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        T.a,
                                        {
                                            color: "textSecondary",
                                            gutterBottom: !0,
                                            variant: "h6",
                                        },
                                        "Facturas del d\xeda"
                                    ),
                                    r.a.createElement(
                                        T.a,
                                        { color: "textPrimary", variant: "h3" },
                                        c.numeroFacturas
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        P.a,
                                        { className: l.avatar },
                                        r.a.createElement(Fa.a, null)
                                    )
                                )
                            )
                        )
                    );
                },
                Ra = [
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1049",
                        amount: 30.5,
                        customer: { name: "Ekaterina Tankova" },
                        createdAt: 15550164e5,
                        status: "pending",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1048",
                        amount: 25.1,
                        customer: { name: "Cao Yu" },
                        createdAt: 15550164e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1047",
                        amount: 10.99,
                        customer: { name: "Alexa Richardson" },
                        createdAt: 155493e7,
                        status: "refunded",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1046",
                        amount: 96.43,
                        customer: { name: "Anje Keizer" },
                        createdAt: 15547572e5,
                        status: "pending",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1045",
                        amount: 32.54,
                        customer: { name: "Clarke Gillebert" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1044",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1044",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "CDD1044",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "sss",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "sssssss",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                    {
                        id: Object(sa.a)(),
                        ref: "aaaasss",
                        amount: 16.76,
                        customer: { name: "Adam Denisov" },
                        createdAt: 15546708e5,
                        status: "delivered",
                    },
                ],
                Ba = Object(u.a)(function () {
                    return {
                        root: {},
                        actions: { justifyContent: "flex-end" },
                    };
                }),
                Da = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Object(n.useContext)(da).reporte,
                        c = Ba(),
                        o = Object(n.useState)(Ra);
                    Object(h.a)(o, 1)[0];
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(c.root, a) }, t),
                        r.a.createElement(Fe.a, {
                            title: "Detalles de Ventas",
                        }),
                        r.a.createElement(F.a, null),
                        r.a.createElement(
                            Ve.a,
                            null,
                            r.a.createElement(
                                I.a,
                                { minWidth: 400 },
                                r.a.createElement(
                                    ze.a,
                                    null,
                                    r.a.createElement(
                                        We.a,
                                        null,
                                        r.a.createElement(
                                            Ue.a,
                                            null,
                                            r.a.createElement(
                                                qe.a,
                                                null,
                                                "Incidencia"
                                            ),
                                            r.a.createElement(
                                                qe.a,
                                                null,
                                                "Producto/Credito/Orden"
                                            ),
                                            r.a.createElement(
                                                qe.a,
                                                null,
                                                "Detalle"
                                            ),
                                            r.a.createElement(
                                                qe.a,
                                                null,
                                                "Valor"
                                            )
                                        )
                                    ),
                                    r.a.createElement(
                                        $e.a,
                                        null,
                                        l.desglose.map(function (e) {
                                            return r.a.createElement(
                                                Ue.a,
                                                { hover: !0, key: e.id },
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    e.incidencia
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    e.detalle
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    e.precio_tipo
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    "$ ",
                                                    e.valor
                                                )
                                            );
                                        })
                                    )
                                )
                            )
                        ),
                        r.a.createElement(I.a, {
                            display: "flex",
                            justifyContent: "flex-end",
                            p: 2,
                        })
                    );
                },
                La = t(595);
            Object(u.a)({
                root: { height: "100%" },
                image: { height: 48, width: 48 },
            }),
                t(293),
                t(77),
                t(124);
            t(596),
                t(597),
                Object(sa.a)(),
                xe()().subtract(2, "hours"),
                Object(sa.a)(),
                xe()().subtract(2, "hours"),
                Object(sa.a)(),
                xe()().subtract(3, "hours"),
                Object(sa.a)(),
                xe()().subtract(5, "hours"),
                Object(sa.a)(),
                xe()().subtract(9, "hours"),
                Object(u.a)({
                    root: { height: "100%" },
                    image: { height: 48, width: 48 },
                }),
                t(23),
                t(415),
                t(221),
                Object(u.a)(function () {
                    return { root: {} };
                });
            var Ma = t(416),
                Va = t.n(Ma),
                za = Object(u.a)(function () {
                    return {
                        root: { height: "100%" },
                        avatar: {
                            backgroundColor: f.a.orange[600],
                            height: 56,
                            width: 56,
                        },
                    };
                }),
                Wa = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Object(n.useContext)(da).reporte,
                        c = za();
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(c.root, a) }, t),
                        r.a.createElement(
                            je.a,
                            null,
                            r.a.createElement(
                                fe.a,
                                {
                                    container: !0,
                                    justify: "space-between",
                                    spacing: 3,
                                },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        T.a,
                                        {
                                            color: "textSecondary",
                                            gutterBottom: !0,
                                            variant: "h6",
                                        },
                                        "CRDT. PENDIENTES"
                                    ),
                                    r.a.createElement(
                                        T.a,
                                        { color: "textPrimary", variant: "h3" },
                                        l.numeroCreditos,
                                        " cr\xe9dito/s"
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        P.a,
                                        { className: c.avatar },
                                        r.a.createElement(Va.a, null)
                                    )
                                )
                            ),
                            r.a.createElement(I.a, { mt: 3 })
                        )
                    );
                },
                Ua = t(417),
                qa = t.n(Ua),
                $a = Object(u.a)(function (e) {
                    return {
                        root: { height: "100%" },
                        avatar: {
                            backgroundColor: f.a.green[600],
                            height: 56,
                            width: 56,
                        },
                        differenceIcon: { color: f.a.green[900] },
                        differenceValue: {
                            color: f.a.green[900],
                            marginRight: e.spacing(1),
                        },
                    };
                }),
                Ya = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = $a(),
                        c = Object(n.useContext)(da).reporte;
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            je.a,
                            null,
                            r.a.createElement(
                                fe.a,
                                {
                                    container: !0,
                                    justify: "space-between",
                                    spacing: 3,
                                },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        T.a,
                                        {
                                            color: "textSecondary",
                                            gutterBottom: !0,
                                            variant: "h6",
                                        },
                                        "TOTAL CLIENTES"
                                    ),
                                    r.a.createElement(
                                        T.a,
                                        { color: "textPrimary", variant: "h3" },
                                        c.clientes
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        P.a,
                                        { className: l.avatar },
                                        r.a.createElement(qa.a, null)
                                    )
                                )
                            ),
                            "Clientes Registrados"
                        )
                    );
                },
                Ga = t(418),
                Ha = t.n(Ga),
                Xa = Object(u.a)(function () {
                    return {
                        root: { height: "100%" },
                        avatar: {
                            backgroundColor: f.a.indigo[600],
                            height: 56,
                            width: 56,
                        },
                    };
                }),
                Ka = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Xa(),
                        c = Object(n.useContext)(da).reporte;
                    return r.a.createElement(
                        Oe.a,
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            je.a,
                            null,
                            r.a.createElement(
                                fe.a,
                                {
                                    container: !0,
                                    justify: "space-between",
                                    spacing: 3,
                                },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        T.a,
                                        {
                                            color: "textSecondary",
                                            gutterBottom: !0,
                                            variant: "h6",
                                        },
                                        "VENTAS DEL D\xcdA"
                                    ),
                                    r.a.createElement(
                                        T.a,
                                        { color: "textPrimary", variant: "h3" },
                                        "$ ",
                                        c.totalVentas
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0 },
                                    r.a.createElement(
                                        P.a,
                                        { className: l.avatar },
                                        r.a.createElement(Ha.a, null)
                                    )
                                )
                            )
                        )
                    );
                },
                Ja =
                    (t(419),
                    t(421),
                    t(420),
                    Object(u.a)(function () {
                        return { root: { height: "100%" } };
                    }),
                    Object(u.a)(function (e) {
                        return {
                            root: {
                                backgroundColor: e.palette.background.dark,
                                minHeight: "100%",
                                paddingBottom: e.spacing(3),
                                paddingTop: e.spacing(3),
                            },
                        };
                    })),
                Za = function () {
                    var e = Ja();
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Dashboard" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: !1 },
                            r.a.createElement(
                                fe.a,
                                { container: !0, spacing: 3 },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 3, sm: 6, xl: 3, xs: 12 },
                                    r.a.createElement(Aa, null)
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 3, sm: 6, xl: 3, xs: 12 },
                                    r.a.createElement(Ya, null)
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 3, sm: 6, xl: 3, xs: 12 },
                                    r.a.createElement(Wa, null)
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 3, sm: 6, xl: 3, xs: 12 },
                                    r.a.createElement(Ka, null)
                                ),
                                r.a.createElement(fe.a, {
                                    item: !0,
                                    lg: 8,
                                    md: 12,
                                    xl: 9,
                                    xs: 12,
                                }),
                                r.a.createElement(fe.a, {
                                    item: !0,
                                    lg: 4,
                                    md: 6,
                                    xl: 3,
                                    xs: 12,
                                }),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, lg: 12, md: 12, xl: 9, xs: 12 },
                                    r.a.createElement(Da, null)
                                )
                            )
                        )
                    );
                },
                Qa = t(116),
                et = t(245),
                at = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            height: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                tt = function () {
                    var e = at(),
                        a = Object(i.g)(),
                        t = Object(n.useContext)(w),
                        l = (t.credenciales, t.setCredenciales),
                        c = t.login,
                        o = t.setUserloggin,
                        s = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(t, n) {
                                    var r, i;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (r = {
                                                            user: t.email,
                                                            pass: t.password,
                                                        }),
                                                        (e.next = 3),
                                                        c(r)
                                                    );
                                                case 3:
                                                    if (
                                                        1 === (i = e.sent).login
                                                    ) {
                                                        e.next = 7;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            i.mensaje,
                                                            5
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 7:
                                                    o({
                                                        avatar: "/static/images/avatars/avatar_6.png",
                                                        jobTitle: i.tipo,
                                                        name: i.nombres,
                                                    }),
                                                        localStorage.setItem(
                                                            "login",
                                                            1
                                                        ),
                                                        localStorage.setItem(
                                                            "user_id",
                                                            i.user_id
                                                        ),
                                                        localStorage.setItem(
                                                            "nombres",
                                                            i.nombres
                                                        ),
                                                        localStorage.setItem(
                                                            "tipo_usuario",
                                                            i.tipo
                                                        ),
                                                        localStorage.setItem(
                                                            "tipousuario_id",
                                                            i.tipousuario_id
                                                        ),
                                                        localStorage.setItem(
                                                            "hora_inicio",
                                                            i.hora_inicio
                                                        ),
                                                        localStorage.setItem(
                                                            "hora_fin",
                                                            i.hora_fin
                                                        ),
                                                        l(i),
                                                        "ADMINISTRADOR" ===
                                                        i.tipo
                                                            ? a(
                                                                  "/app/dashboard",
                                                                  {
                                                                      replace:
                                                                          !0,
                                                                  }
                                                              )
                                                            : a("/app", {
                                                                  replace: !0,
                                                              });
                                                case 17:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a, t) {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(function () {
                            localStorage.removeItem("login"),
                                localStorage.removeItem("user_id"),
                                localStorage.removeItem("tipo_usuario"),
                                localStorage.removeItem("nombres"),
                                localStorage.removeItem("tipousuario_id"),
                                localStorage.removeItem("hora_inicio"),
                                localStorage.removeItem("hora_fin");
                        }, []),
                        r.a.createElement(
                            he,
                            { className: e.root, title: "Login" },
                            r.a.createElement(
                                I.a,
                                {
                                    display: "flex",
                                    flexDirection: "column",
                                    height: "100%",
                                    justifyContent: "center",
                                },
                                r.a.createElement(
                                    be.a,
                                    { maxWidth: "sm" },
                                    r.a.createElement(
                                        et.a,
                                        {
                                            initialValues: {
                                                email: "",
                                                password: "",
                                            },
                                            onSubmit: function (e, a) {
                                                s(e, a);
                                            },
                                        },
                                        function (e) {
                                            var a = e.errors,
                                                t = e.handleBlur,
                                                n = e.handleChange,
                                                l = e.handleSubmit,
                                                c = (e.isSubmitting, e.touched),
                                                o = e.values;
                                            return r.a.createElement(
                                                "form",
                                                { onSubmit: l },
                                                r.a.createElement(
                                                    I.a,
                                                    { mb: 3 },
                                                    r.a.createElement(
                                                        T.a,
                                                        {
                                                            color: "textPrimary",
                                                            variant: "h2",
                                                        },
                                                        "Iniciar Sesi\xf3n"
                                                    ),
                                                    r.a.createElement(
                                                        T.a,
                                                        {
                                                            color: "textSecondary",
                                                            gutterBottom: !0,
                                                            variant: "body2",
                                                        },
                                                        "Indentifique"
                                                    )
                                                ),
                                                r.a.createElement(_e.a, {
                                                    error: Boolean(
                                                        c.email && a.email
                                                    ),
                                                    fullWidth: !0,
                                                    helperText:
                                                        c.email && a.email,
                                                    label: "Usuario",
                                                    margin: "normal",
                                                    name: "email",
                                                    onChange: n,
                                                    type: "text",
                                                    value: o.email,
                                                    variant: "outlined",
                                                }),
                                                r.a.createElement(_e.a, {
                                                    error: Boolean(
                                                        c.password && a.password
                                                    ),
                                                    fullWidth: !0,
                                                    helperText:
                                                        c.password &&
                                                        a.password,
                                                    label: "Password",
                                                    margin: "normal",
                                                    name: "password",
                                                    onBlur: t,
                                                    onChange: n,
                                                    type: "password",
                                                    value: o.password,
                                                    variant: "outlined",
                                                }),
                                                r.a.createElement(
                                                    I.a,
                                                    { my: 2 },
                                                    r.a.createElement(
                                                        Y.a,
                                                        {
                                                            color: "primary",
                                                            fullWidth: !0,
                                                            size: "large",
                                                            type: "submit",
                                                            variant:
                                                                "contained",
                                                        },
                                                        "Iniciar sesi\xf3n"
                                                    )
                                                )
                                            );
                                        }
                                    )
                                )
                            )
                        )
                    );
                },
                nt = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            height: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                        image: {
                            marginTop: 50,
                            display: "inline-block",
                            maxWidth: "100%",
                            width: 560,
                        },
                    };
                }),
                rt = function () {
                    var e = nt();
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "404" },
                        r.a.createElement(
                            I.a,
                            {
                                display: "flex",
                                flexDirection: "column",
                                height: "100%",
                                justifyContent: "center",
                            },
                            r.a.createElement(
                                be.a,
                                { maxWidth: "md" },
                                r.a.createElement(
                                    T.a,
                                    {
                                        align: "center",
                                        color: "textPrimary",
                                        variant: "h1",
                                    },
                                    "404: The page you are looking for isn\u2019t here"
                                ),
                                r.a.createElement(
                                    T.a,
                                    {
                                        align: "center",
                                        color: "textPrimary",
                                        variant: "subtitle2",
                                    },
                                    "You either tried some shady route or you came here by mistake. Whichever it is, try using the navigation"
                                ),
                                r.a.createElement(
                                    I.a,
                                    { textAlign: "center" },
                                    r.a.createElement("img", {
                                        alt: "Under development",
                                        className: e.image,
                                        src: "/static/images/undraw_page_not_found_su7k.svg",
                                    })
                                )
                            )
                        )
                    );
                },
                lt = (t(294), t(295)),
                ct = Object(u.a)(function (e) {
                    return {
                        root: { "& > *": { margin: e.spacing(1) } },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                    };
                });
            function ot(e) {
                var a = e.inputRef,
                    t = e.onChange,
                    n = Object(U.a)(e, ["inputRef", "onChange"]);
                return r.a.createElement(
                    lt.a,
                    Object.assign({}, n, {
                        getInputRef: a,
                        onValueChange: function (a) {
                            t({ target: { name: e.name, value: a.value } });
                        },
                        thousandSeparator: !0,
                        isNumericString: !0,
                        prefix: "$",
                    })
                );
            }
            function it(e) {
                var a = e.label,
                    t = e.helperText,
                    n = e.onChangeText,
                    l = (e.value, ct()),
                    c = r.a.useState({
                        textmask:
                            "(1\u2000\u2000) \u2000\u2000\u2000-\u2000\u2000\u2000\u2000",
                        numberformat: "0",
                    }),
                    o = Object(h.a)(c, 2),
                    i = o[0],
                    s = o[1];
                return r.a.createElement(_e.a, {
                    label: a,
                    value: i.numberformat,
                    className: l.textField,
                    onChange: function (e) {
                        n(e.target.value),
                            s(
                                Object(Te.a)(
                                    Object(Te.a)({}, i),
                                    {},
                                    Object(v.a)(
                                        {},
                                        e.target.name,
                                        e.target.value
                                    )
                                )
                            );
                    },
                    margin: "dense",
                    name: "numberformat",
                    id: "formatted-numberformat-input",
                    helperText: t,
                    InputProps: { inputComponent: ot },
                });
            }
            var st = "api/productos/buscarProducto",
                ut = "api/productos/listado/1000000000000",
                mt = "api/productos",
                dt = "api/productos",
                pt = Object(n.createContext)(),
                gt = function (e) {
                    var a = Object(n.useState)([]),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)([]),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useState)(!1),
                        f = Object(h.a)(b, 2),
                        E = f[0],
                        v = f[1],
                        x = Object(n.useState)(!0),
                        C = Object(h.a)(x, 2),
                        w = (C[0], C[1]),
                        S = Object(n.useState)(0),
                        k = Object(h.a)(S, 2),
                        N = k[0],
                        I = k[1],
                        P = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        "" !== a &&
                                                            (a = "/".concat(a)),
                                                        (e.next = 3),
                                                        y.get(st + a)
                                                    );
                                                case 3:
                                                    (t = e.sent), c(t.data);
                                                case 5:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        T = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(ut)
                                                    );
                                                case 2:
                                                    (a = e.sent),
                                                        c(a.data),
                                                        u(a.data),
                                                        g(a.data);
                                                case 6:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        F = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(mt, a)
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        (e.next = 5),
                                                        T()
                                                    );
                                                case 5:
                                                    console.log(t);
                                                case 6:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        _ = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.delete(
                                                            dt + "/" + N.id
                                                        )
                                                    );
                                                case 2:
                                                    if (
                                                        200 ===
                                                        (a = e.sent).data.estado
                                                    ) {
                                                        e.next = 6;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            a.data.mensaje,
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 6:
                                                    ea.a.success(
                                                        a.data.mensaje,
                                                        2
                                                    ),
                                                        T();
                                                case 8:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(function () {
                            T();
                        }, []),
                        r.a.createElement(
                            pt.Provider,
                            {
                                value: {
                                    productos: l,
                                    setProductos: c,
                                    productosTemp: s,
                                    setProductosTemp: u,
                                    buscarProductos: P,
                                    setReload: w,
                                    guardarProducto: F,
                                    isNew: E,
                                    setIsNew: v,
                                    eliminarProducto: _,
                                    deleteProducto: N,
                                    setDeleteProducto: I,
                                    ObtenerProductos: T,
                                    productosTemp2: p,
                                    setProductosTemp2: g,
                                },
                            },
                            e.children
                        )
                    );
                },
                bt = Object(u.a)(function (e) {
                    return {
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                });
            function ft() {
                var e = bt(),
                    a = Object(n.useContext)(pt),
                    t = a.guardarProducto,
                    l = a.setIsNew,
                    c = Object(n.useState)(""),
                    o = Object(h.a)(c, 2),
                    i = o[0],
                    s = o[1],
                    u = Object(n.useState)(""),
                    m = Object(h.a)(u, 2),
                    d = m[0],
                    p = m[1],
                    g = Object(n.useState)(""),
                    b = Object(h.a)(g, 2),
                    f = b[0],
                    E = b[1],
                    v = Object(n.useState)(""),
                    x = Object(h.a)(v, 2),
                    C = x[0],
                    y = x[1],
                    w = Object(n.useState)(""),
                    S = Object(h.a)(w, 2),
                    k = S[0],
                    N = S[1],
                    P = Object(n.useState)(""),
                    T = Object(h.a)(P, 2),
                    F = T[0],
                    _ = T[1],
                    A = Object(n.useState)(""),
                    R = Object(h.a)(A, 2),
                    B = R[0],
                    D = R[1],
                    L = Object(n.useState)(0),
                    M = Object(h.a)(L, 2),
                    V = M[0],
                    z = M[1],
                    W = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a, n;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                if ("" !== i) {
                                                    e.next = 3;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "Falta el nombre del prodcuto",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 3:
                                                if ("" !== F && 0 !== +F) {
                                                    e.next = 6;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "El precio de compra no puede ser vac\xedo o 0",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 6:
                                                if ("" !== C && 0 !== +C) {
                                                    e.next = 9;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "El precio p\xfablico no puede ser vac\xedo o 0",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 9:
                                                if ("" !== k && 0 !== +k) {
                                                    e.next = 12;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "El precio T\xe9cnico no puede ser vac\xedo o 0",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 12:
                                                if ("" !== B && 0 !== +B) {
                                                    e.next = 15;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "El precio Mayorista no puede ser vac\xedo o 0",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 15:
                                                if ("" !== V && 0 !== +V) {
                                                    e.next = 18;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "El Stock no puede ser vac\xedo o 0",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 18:
                                                "" === (a = d) && (a = "-"),
                                                    "" === (n = f) && (n = "-"),
                                                    t({
                                                        nombre: i,
                                                        descripcion: a,
                                                        codigo_barra: n,
                                                        precio_publico: C,
                                                        precio_tecnico: k,
                                                        precio_compra: F,
                                                        precio_distribuidor: B,
                                                        stock: V,
                                                    }),
                                                    l(!1);
                                            case 25:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        "div",
                        { className: e.root },
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                label: "Nombre producto",
                                id: "margin-none",
                                defaultValue: "",
                                onChange: function (e) {
                                    return s(e.target.value);
                                },
                                className: e.textField1,
                                helperText:
                                    "Describa un nombre para el producto",
                            }),
                            r.a.createElement(_e.a, {
                                id: "standard-full-width",
                                onChange: function (e) {
                                    return p(e.target.value);
                                },
                                label: "Descripci\xf3n",
                                style: { margin: 8, width: "90%" },
                                placeholder: "",
                                multiline: !0,
                                helperText:
                                    "Describa una descripci\xf3n breve del producto",
                                margin: "normal",
                                InputLabelProps: { shrink: !0 },
                            }),
                            r.a.createElement(it, {
                                label: "P. Compra",
                                helperText:
                                    "Precio al que se adquiri\xf3 el producto",
                                onChangeText: _,
                            }),
                            r.a.createElement(it, {
                                label: "P. P\xfablico",
                                helperText:
                                    "Precio al que se vender\xe1 al p\xfablico.",
                                onChangeText: y,
                            }),
                            r.a.createElement(it, {
                                label: "P. T\xe9cnico",
                                helperText:
                                    "Precio para los t\xe9cnicos del local.",
                                onChangeText: N,
                            }),
                            r.a.createElement(it, {
                                label: "P. Mayorista",
                                helperText: "Precio para ventas al mayoreo",
                                onChangeText: D,
                            })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                id: "filled-full-width",
                                label: "C\xf3digo de barras |||",
                                style: { margin: 4, width: "425px" },
                                placeholder: "",
                                helperText:
                                    "C\xf3digo de barra que identificar\xe1 el producto al facturar",
                                fullWidth: !0,
                                margin: "normal",
                                onChange: function (e) {
                                    return E(e.target.value);
                                },
                                InputLabelProps: { shrink: !0 },
                                variant: "filled",
                            }),
                            r.a.createElement(_e.a, {
                                label: "Stock",
                                id: "margin-none",
                                defaultValue: "",
                                type: "number",
                                onChange: function (e) {
                                    return z(e.target.value);
                                },
                                className: e.textField,
                                helperText: "Cantidad de productos disponibles",
                            })
                        ),
                        r.a.createElement("div", null)
                    ),
                    r.a.createElement(
                        I.a,
                        { display: "flex", justifyContent: "flex-end" },
                        r.a.createElement(
                            Y.a,
                            {
                                variant: "contained",
                                className: e.btn,
                                onClick: function () {
                                    l(!1);
                                },
                            },
                            "Cancelar"
                        ),
                        r.a.createElement(
                            Y.a,
                            {
                                color: "primary",
                                variant: "contained",
                                onClick: W,
                            },
                            "Guardar"
                        )
                    )
                );
            }
            var Et = Object(u.a)(function (e) {
                    return {
                        root: {},
                        importButton: { marginRight: e.spacing(1) },
                        exportButton: { marginRight: e.spacing(1) },
                    };
                }),
                ht = function (e) {
                    var a = e.filrarProductos;
                    return r.a.createElement(
                        je.a,
                        null,
                        r.a.createElement(
                            I.a,
                            { maxWidth: 500 },
                            r.a.createElement(_e.a, {
                                fullWidth: !0,
                                onChange: a,
                                InputProps: {
                                    startAdornment: r.a.createElement(
                                        Je.a,
                                        { position: "start" },
                                        r.a.createElement(
                                            Ze.a,
                                            {
                                                fontSize: "small",
                                                color: "action",
                                            },
                                            r.a.createElement(ca.a, null)
                                        )
                                    ),
                                },
                                placeholder: "Buscar producto",
                                variant: "outlined",
                            })
                        )
                    );
                },
                vt = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Et(),
                        c = Object(n.useContext)(pt),
                        o = c.setProductosTemp,
                        i = c.productos,
                        s = c.isNew,
                        u = c.setIsNew,
                        m = c.eliminarProducto,
                        d = c.deleteProducto;
                    return r.a.createElement(
                        "div",
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            I.a,
                            { display: "flex", justifyContent: "flex-end" },
                            s
                                ? null
                                : r.a.createElement(
                                      Y.a,
                                      {
                                          variant: "contained",
                                          style: {
                                              backgroundColor:
                                                  "rgb(154, 0, 54)",
                                          },
                                          color: "secondary",
                                          className: l.exportButton,
                                          startIcon: r.a.createElement(
                                              He.a,
                                              null
                                          ),
                                          onClick: function () {
                                              void 0 !==
                                                  (null === d || void 0 === d
                                                      ? void 0
                                                      : d.id) &&
                                                  Ke.a
                                                      .fire({
                                                          title: "\xbfEst\xe1 seguro de eliminar el producto?",
                                                          showDenyButton: !0,
                                                          confirmButtonText:
                                                              "si, eliminar",
                                                          denyButtonText:
                                                              "Cancelar",
                                                      })
                                                      .then(
                                                          (function () {
                                                              var e = Object(
                                                                  j.a
                                                              )(
                                                                  O.a.mark(
                                                                      function e(
                                                                          a
                                                                      ) {
                                                                          return O.a.wrap(
                                                                              function (
                                                                                  e
                                                                              ) {
                                                                                  for (;;)
                                                                                      switch (
                                                                                          (e.prev =
                                                                                              e.next)
                                                                                      ) {
                                                                                          case 0:
                                                                                              a.isConfirmed &&
                                                                                                  m();
                                                                                          case 1:
                                                                                          case "end":
                                                                                              return e.stop();
                                                                                      }
                                                                              },
                                                                              e
                                                                          );
                                                                      }
                                                                  )
                                                              );
                                                              return function (
                                                                  a
                                                              ) {
                                                                  return e.apply(
                                                                      this,
                                                                      arguments
                                                                  );
                                                              };
                                                          })()
                                                      );
                                          },
                                      },
                                      "Eliminar"
                                  ),
                            s
                                ? null
                                : r.a.createElement(
                                      Y.a,
                                      {
                                          color: "primary",
                                          variant: "contained",
                                          onClick: function () {
                                              u(!0);
                                          },
                                      },
                                      "Nuevo Producto"
                                  )
                        ),
                        r.a.createElement(
                            I.a,
                            { mt: 3 },
                            r.a.createElement(
                                Oe.a,
                                null,
                                s
                                    ? r.a.createElement(ft, null)
                                    : r.a.createElement(ht, {
                                          filrarProductos: function (e) {
                                              console.log(e.target.value),
                                                  console.log(i);
                                              var a = i.filter(function (a) {
                                                  var t =
                                                          a.nombre.toUpperCase(),
                                                      n =
                                                          e.target.value.toUpperCase(),
                                                      r =
                                                          null ===
                                                          a.codigo_barra
                                                              ? ""
                                                              : a.codigo_barra.toUpperCase(),
                                                      l =
                                                          e.target.value.toUpperCase();
                                                  return (
                                                      t.indexOf(n) > -1 ||
                                                      r.indexOf(l) > -1
                                                  );
                                              });
                                              console.log(a), o(a);
                                          },
                                      })
                            )
                        )
                    );
                },
                xt =
                    (t(241),
                    t(242),
                    Object(u.a)(function (e) {
                        return {
                            root: { display: "flex", flexDirection: "column" },
                            statsItem: {
                                alignItems: "center",
                                display: "flex",
                            },
                            statsIcon: { marginRight: e.spacing(1) },
                        };
                    }),
                    [
                        {
                            field: "id",
                            headerName: "ID",
                            width: 90,
                            visible: !1,
                        },
                        {
                            field: "stock",
                            headerName: "Stock",
                            width: 115,
                            editable: !0,
                        },
                        {
                            field: "nombre",
                            headerName: "Nombre",
                            width: 420,
                            editable: !0,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "precio_publico",
                            headerName: "P. P\xfablico",
                            width: 140,
                            editable: !0,
                        },
                        {
                            field: "precio_tecnico",
                            headerName: "P. T\xe9cnico",
                            width: 160,
                            editable: !0,
                        },
                        {
                            field: "precio_distribuidor",
                            headerName: "P. Mayorista",
                            width: 170,
                            editable: !0,
                        },
                        {
                            field: "precio_compra",
                            headerName: "P. compra",
                            width: 140,
                            editable: !0,
                        },
                        {
                            field: "codigo_barra",
                            headerName: "Cod. Barra",
                            width: 315,
                            editable: !0,
                        },
                        {
                            field: "descripcion",
                            headerName: "Descripci\xf3n",
                            width: 200,
                            editable: !0,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                    ]),
                Ot = "api/productos";
            function jt() {
                var e = n.useState(!1),
                    a = Object(h.a)(e, 2),
                    t = a[0],
                    r = a[1],
                    l = n.useState([{ mycae: "1" }]),
                    c = Object(h.a)(l, 2),
                    o = (c[0], c[1], n.useContext(pt)),
                    i = o.productos,
                    s = o.productosTemp,
                    u = o.setProductos,
                    m = (o.setReload, o.setProductosTemp),
                    d = o.setDeleteProducto,
                    p = o.ObtenerProductos;
                n.useEffect(function () {
                    return (
                        p(),
                        function () {
                            i.length > 0 && m(i);
                        }
                    );
                }, []);
                var g = (function () {
                    var e = Object(j.a)(
                        O.a.mark(function e(a) {
                            var t;
                            return O.a.wrap(function (e) {
                                for (;;)
                                    switch ((e.prev = e.next)) {
                                        case 0:
                                            return (
                                                r(!0),
                                                (e.next = 3),
                                                y.patch(Ot + "/" + a.id, a)
                                            );
                                        case 3:
                                            (t = e.sent),
                                                r(!1),
                                                ea.a.success("Actualizado", 2),
                                                console.log(t);
                                        case 7:
                                        case "end":
                                            return e.stop();
                                    }
                            }, e);
                        })
                    );
                    return function (a) {
                        return e.apply(this, arguments);
                    };
                })();
                return n.createElement(
                    Oe.a,
                    null,
                    n.createElement(
                        "div",
                        { style: { height: 360, width: "100%" } },
                        n.createElement(ya.a, {
                            rows: s,
                            columns: xt,
                            checkboxSelection: !1,
                            datasets: "Commodity",
                            onEditCellChangeCommitted: function (e) {
                                var a = e.field,
                                    t = [],
                                    n = i.map(function (n) {
                                        return n.id === e.id
                                            ? ("nombre" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { nombre: e.props.value }
                                                  )),
                                              "descripcion" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          descripcion:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "precio_publico" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          precio_publico:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "precio_tecnico" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          precio_tecnico:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "precio_compra" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          precio_compra:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "precio_distribuidor" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          precio_distribuidor:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "stock" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { stock: e.props.value }
                                                  )),
                                              "codigo_barra" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          codigo_barra:
                                                              e.props.value,
                                                      }
                                                  )),
                                              g(t),
                                              t)
                                            : n;
                                    });
                                u(n);
                            },
                            pageSize: 10,
                            disableSelectionOnClick: !1,
                            rowHeight: 23,
                            onRowSelected: function (e) {
                                d(e.data);
                            },
                            loading: t,
                        })
                    )
                );
            }
            var Ct = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                        productCard: { height: "100%" },
                    };
                }),
                yt = function () {
                    var e = Ct();
                    Object(n.useContext)(pt).productos;
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Clientes" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: !1 },
                            r.a.createElement(vt, null),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(jt, null)
                            )
                        )
                    );
                },
                wt = t(599),
                St = t(406),
                kt = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            height: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                Nt = function () {
                    var e = kt(),
                        a = Object(i.g)();
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Register" },
                        r.a.createElement(
                            I.a,
                            {
                                display: "flex",
                                flexDirection: "column",
                                height: "100%",
                                justifyContent: "center",
                            },
                            r.a.createElement(
                                be.a,
                                { maxWidth: "sm" },
                                r.a.createElement(
                                    et.a,
                                    {
                                        initialValues: {
                                            email: "",
                                            firstName: "",
                                            lastName: "",
                                            password: "",
                                            policy: !1,
                                        },
                                        validationSchema: Qa.b().shape({
                                            email: Qa.c()
                                                .email("Must be a valid email")
                                                .max(255)
                                                .required("Email is required"),
                                            firstName: Qa.c()
                                                .max(255)
                                                .required(
                                                    "First name is required"
                                                ),
                                            lastName: Qa.c()
                                                .max(255)
                                                .required(
                                                    "Last name is required"
                                                ),
                                            password: Qa.c()
                                                .max(255)
                                                .required(
                                                    "password is required"
                                                ),
                                            policy: Qa.a().oneOf(
                                                [!0],
                                                "This field must be checked"
                                            ),
                                        }),
                                        onSubmit: function () {
                                            a("/app/dashboard", {
                                                replace: !0,
                                            });
                                        },
                                    },
                                    function (e) {
                                        var a = e.errors,
                                            t = e.handleBlur,
                                            n = e.handleChange,
                                            l = e.handleSubmit,
                                            c = e.isSubmitting,
                                            i = e.touched,
                                            s = e.values;
                                        return r.a.createElement(
                                            "form",
                                            { onSubmit: l },
                                            r.a.createElement(
                                                I.a,
                                                { mb: 3 },
                                                r.a.createElement(
                                                    T.a,
                                                    {
                                                        color: "textPrimary",
                                                        variant: "h2",
                                                    },
                                                    "Create new account"
                                                ),
                                                r.a.createElement(
                                                    T.a,
                                                    {
                                                        color: "textSecondary",
                                                        gutterBottom: !0,
                                                        variant: "body2",
                                                    },
                                                    "Use your email to create new account"
                                                )
                                            ),
                                            r.a.createElement(_e.a, {
                                                error: Boolean(
                                                    i.firstName && a.firstName
                                                ),
                                                fullWidth: !0,
                                                helperText:
                                                    i.firstName && a.firstName,
                                                label: "First name",
                                                margin: "normal",
                                                name: "firstName",
                                                onBlur: t,
                                                onChange: n,
                                                value: s.firstName,
                                                variant: "outlined",
                                            }),
                                            r.a.createElement(_e.a, {
                                                error: Boolean(
                                                    i.lastName && a.lastName
                                                ),
                                                fullWidth: !0,
                                                helperText:
                                                    i.lastName && a.lastName,
                                                label: "Last name",
                                                margin: "normal",
                                                name: "lastName",
                                                onBlur: t,
                                                onChange: n,
                                                value: s.lastName,
                                                variant: "outlined",
                                            }),
                                            r.a.createElement(_e.a, {
                                                error: Boolean(
                                                    i.email && a.email
                                                ),
                                                fullWidth: !0,
                                                helperText: i.email && a.email,
                                                label: "Email Address",
                                                margin: "normal",
                                                name: "email",
                                                onBlur: t,
                                                onChange: n,
                                                type: "email",
                                                value: s.email,
                                                variant: "outlined",
                                            }),
                                            r.a.createElement(_e.a, {
                                                error: Boolean(
                                                    i.password && a.password
                                                ),
                                                fullWidth: !0,
                                                helperText:
                                                    i.password && a.password,
                                                label: "Password",
                                                margin: "normal",
                                                name: "password",
                                                onBlur: t,
                                                onChange: n,
                                                type: "password",
                                                value: s.password,
                                                variant: "outlined",
                                            }),
                                            r.a.createElement(
                                                I.a,
                                                {
                                                    alignItems: "center",
                                                    display: "flex",
                                                    ml: -1,
                                                },
                                                r.a.createElement(Ye.a, {
                                                    checked: s.policy,
                                                    name: "policy",
                                                    onChange: n,
                                                }),
                                                r.a.createElement(
                                                    T.a,
                                                    {
                                                        color: "textSecondary",
                                                        variant: "body1",
                                                    },
                                                    "I have read the",
                                                    " ",
                                                    r.a.createElement(
                                                        wt.a,
                                                        {
                                                            color: "primary",
                                                            component: o.b,
                                                            to: "#",
                                                            underline: "always",
                                                            variant: "h6",
                                                        },
                                                        "Terms and Conditions"
                                                    )
                                                )
                                            ),
                                            Boolean(i.policy && a.policy) &&
                                                r.a.createElement(
                                                    St.a,
                                                    { error: !0 },
                                                    a.policy
                                                ),
                                            r.a.createElement(
                                                I.a,
                                                { my: 2 },
                                                r.a.createElement(
                                                    Y.a,
                                                    {
                                                        color: "primary",
                                                        disabled: c,
                                                        fullWidth: !0,
                                                        size: "large",
                                                        type: "submit",
                                                        variant: "contained",
                                                    },
                                                    "Sign up now"
                                                )
                                            ),
                                            r.a.createElement(
                                                T.a,
                                                {
                                                    color: "textSecondary",
                                                    variant: "body1",
                                                },
                                                "Have an account?",
                                                " ",
                                                r.a.createElement(
                                                    wt.a,
                                                    {
                                                        component: o.b,
                                                        to: "/login",
                                                        variant: "h6",
                                                    },
                                                    "Sign in"
                                                )
                                            )
                                        );
                                    }
                                )
                            )
                        )
                    );
                },
                It = t(411),
                Pt = Object(u.a)({
                    root: {},
                    item: { display: "flex", flexDirection: "column" },
                }),
                Tt = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        n = Pt();
                    return r.a.createElement(
                        "form",
                        Object.assign({ className: Object(q.a)(n.root, a) }, t),
                        r.a.createElement(
                            Oe.a,
                            null,
                            r.a.createElement(Fe.a, {
                                subheader: "Manage the notifications",
                                title: "Notifications",
                            }),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                je.a,
                                null,
                                r.a.createElement(
                                    fe.a,
                                    { container: !0, spacing: 6, wrap: "wrap" },
                                    r.a.createElement(
                                        fe.a,
                                        {
                                            className: n.item,
                                            item: !0,
                                            md: 4,
                                            sm: 6,
                                            xs: 12,
                                        },
                                        r.a.createElement(
                                            T.a,
                                            {
                                                color: "textPrimary",
                                                gutterBottom: !0,
                                                variant: "h6",
                                            },
                                            "Notifications"
                                        ),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(Ye.a, {
                                                defaultChecked: !0,
                                            }),
                                            label: "Email",
                                        }),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(Ye.a, {
                                                defaultChecked: !0,
                                            }),
                                            label: "Push Notifications",
                                        }),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(
                                                Ye.a,
                                                null
                                            ),
                                            label: "Text Messages",
                                        }),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(Ye.a, {
                                                defaultChecked: !0,
                                            }),
                                            label: "Phone calls",
                                        })
                                    ),
                                    r.a.createElement(
                                        fe.a,
                                        {
                                            className: n.item,
                                            item: !0,
                                            md: 4,
                                            sm: 6,
                                            xs: 12,
                                        },
                                        r.a.createElement(
                                            T.a,
                                            {
                                                color: "textPrimary",
                                                gutterBottom: !0,
                                                variant: "h6",
                                            },
                                            "Messages"
                                        ),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(Ye.a, {
                                                defaultChecked: !0,
                                            }),
                                            label: "Email",
                                        }),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(
                                                Ye.a,
                                                null
                                            ),
                                            label: "Push Notifications",
                                        }),
                                        r.a.createElement(It.a, {
                                            control: r.a.createElement(Ye.a, {
                                                defaultChecked: !0,
                                            }),
                                            label: "Phone calls",
                                        })
                                    )
                                )
                            ),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                I.a,
                                {
                                    display: "flex",
                                    justifyContent: "flex-end",
                                    p: 2,
                                },
                                r.a.createElement(
                                    Y.a,
                                    { color: "primary", variant: "contained" },
                                    "Save"
                                )
                            )
                        )
                    );
                },
                Ft = Object(u.a)({ root: {} }),
                _t = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = Ft(),
                        c = Object(n.useState)({ password: "", confirm: "" }),
                        o = Object(h.a)(c, 2),
                        i = o[0],
                        s = o[1],
                        u = function (e) {
                            s(
                                Object(Te.a)(
                                    Object(Te.a)({}, i),
                                    {},
                                    Object(v.a)(
                                        {},
                                        e.target.name,
                                        e.target.value
                                    )
                                )
                            );
                        };
                    return r.a.createElement(
                        "form",
                        Object.assign({ className: Object(q.a)(l.root, a) }, t),
                        r.a.createElement(
                            Oe.a,
                            null,
                            r.a.createElement(Fe.a, {
                                subheader: "Update password",
                                title: "Password",
                            }),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                je.a,
                                null,
                                r.a.createElement(_e.a, {
                                    fullWidth: !0,
                                    label: "Password",
                                    margin: "normal",
                                    name: "password",
                                    onChange: u,
                                    type: "password",
                                    value: i.password,
                                    variant: "outlined",
                                }),
                                r.a.createElement(_e.a, {
                                    fullWidth: !0,
                                    label: "Confirm password",
                                    margin: "normal",
                                    name: "confirm",
                                    onChange: u,
                                    type: "password",
                                    value: i.confirm,
                                    variant: "outlined",
                                })
                            ),
                            r.a.createElement(F.a, null),
                            r.a.createElement(
                                I.a,
                                {
                                    display: "flex",
                                    justifyContent: "flex-end",
                                    p: 2,
                                },
                                r.a.createElement(
                                    Y.a,
                                    { color: "primary", variant: "contained" },
                                    "Update"
                                )
                            )
                        )
                    );
                },
                At = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                Rt = function () {
                    var e = At();
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Settings" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: "lg" },
                            r.a.createElement(Tt, null),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(_t, null)
                            )
                        )
                    );
                },
                Bt = t(118),
                Dt = "api/creditos/abonar",
                Lt = "api/creditos/lista/listado",
                Mt = Object(n.createContext)(),
                Vt = function (e) {
                    var a = Object(n.useState)(!1),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)(!1),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)([]),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useState)([]),
                        f = Object(h.a)(b, 2),
                        E = f[0],
                        v = f[1],
                        x = Object(n.useState)(!0),
                        C = Object(h.a)(x, 2),
                        w = C[0],
                        S = C[1],
                        k = Object(n.useState)(!1),
                        N = Object(h.a)(k, 2),
                        I = N[0],
                        P = N[1],
                        T = Object(n.useContext)(da).setIsReload,
                        F = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        u(!0),
                                                        (e.next = 3),
                                                        y.post(Dt, {
                                                            credito_id: p.id,
                                                            abono: a,
                                                        })
                                                    );
                                                case 3:
                                                    (t = e.sent),
                                                        T(!0),
                                                        S(!0),
                                                        P(!0),
                                                        u(!1),
                                                        c(!1),
                                                        console.log(t.data);
                                                case 10:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        _ = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(Lt)
                                                    );
                                                case 2:
                                                    (a = e.sent), v(a.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(
                            function () {
                                w &&
                                    (console.log(
                                        "RECARGAR ---------\x3e CREDITPS"
                                    ),
                                    S(!1),
                                    _());
                            },
                            [w]
                        ),
                        r.a.createElement(
                            Mt.Provider,
                            {
                                value: {
                                    setRecargarListaCreditos: S,
                                    recargarListaCreditos: w,
                                    creditos: E,
                                    isOpenModalAbono: l,
                                    SetIsOpenModalAbono: c,
                                    currentCredito: p,
                                    setCurrentCredito: g,
                                    guardarAbono: F,
                                    isLoading: s,
                                    setIsLoading: u,
                                    recargarFiltro: I,
                                    setRecargarFiltro: P,
                                },
                            },
                            e.children
                        )
                    );
                },
                zt = t(32),
                Wt = t(49),
                Ut = Object(n.createContext)(),
                qt = "api/creditos",
                $t = "api/facturas",
                Yt = "api/facturas/impresion/reimpresion/",
                Gt = function (e) {
                    var a = Object(n.useState)([]),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)(-1),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)("-"),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useContext)(ra),
                        f = b.currentCliente,
                        E =
                            (b.setCurrentCliente,
                            Object(n.useContext)(Mt).setRecargarListaCreditos),
                        v = Object(n.useContext)(pt),
                        x = v.productos,
                        C = v.setProductos,
                        w = (v.productosTemp, v.setProductosTemp),
                        S = v.productosTemp2,
                        k = Object(n.useContext)(da).setIsReload,
                        N = Object(n.useState)(""),
                        I = Object(h.a)(N, 2),
                        P = I[0],
                        T = I[1],
                        F = Object(n.useState)([]),
                        _ = Object(h.a)(F, 2),
                        A = _[0],
                        R = _[1],
                        B = Object(n.useState)(!1),
                        D = Object(h.a)(B, 2),
                        L = D[0],
                        M = D[1],
                        V = Object(n.useState)(1),
                        z = Object(h.a)(V, 2),
                        W = z[0],
                        U = z[1],
                        q = Object(n.useState)({
                            subtotal: 0,
                            iva: 0,
                            total: 0,
                        }),
                        $ = Object(h.a)(q, 2),
                        Y = $[0],
                        G = $[1],
                        H = Object(n.useState)("publico"),
                        X = Object(h.a)(H, 2),
                        K = X[0],
                        J = X[1],
                        Z = 0,
                        Q = function (e) {
                            return ue(e / 1.12, 4);
                        },
                        ee = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t = !0),
                                                        (e.next = 3),
                                                        x.map(function (e) {
                                                            e.id == a.id &&
                                                                0 === e.stock &&
                                                                (t = !1);
                                                        })
                                                    );
                                                case 3:
                                                    return e.abrupt(
                                                        "return",
                                                        t
                                                    );
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ae = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r,
                                        l,
                                        c = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t =
                                                            c.length > 1 &&
                                                            void 0 !== c[1]
                                                                ? c[1]
                                                                : 1),
                                                        (n = []),
                                                        (r = []),
                                                        (l = S.map(function (
                                                            e
                                                        ) {
                                                            return (
                                                                e.id == a.id
                                                                    ? ((n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock -
                                                                                      t,
                                                                              }
                                                                          )),
                                                                      (r =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock -
                                                                                      t,
                                                                              }
                                                                          )))
                                                                    : (n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock: e.stock,
                                                                              }
                                                                          )),
                                                                n
                                                            );
                                                        })),
                                                        C(l),
                                                        w(l),
                                                        e.abrupt("return", r)
                                                    );
                                                case 7:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        te = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r,
                                        l,
                                        c = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t =
                                                            c.length > 1 &&
                                                            void 0 !== c[1]
                                                                ? c[1]
                                                                : 1),
                                                        (n = []),
                                                        (r = []),
                                                        (l = x.map(function (
                                                            e
                                                        ) {
                                                            return (
                                                                e.id == a.id
                                                                    ? ((n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock -
                                                                                      t,
                                                                              }
                                                                          )),
                                                                      (r =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock -
                                                                                      t,
                                                                              }
                                                                          )))
                                                                    : (n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock: e.stock,
                                                                              }
                                                                          )),
                                                                n
                                                            );
                                                        })),
                                                        C(l),
                                                        w(l),
                                                        e.abrupt("return", r)
                                                    );
                                                case 7:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ne = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r,
                                        l,
                                        c = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t =
                                                            c.length > 1 &&
                                                            void 0 !== c[1]
                                                                ? c[1]
                                                                : 1),
                                                        (n = []),
                                                        (r = []),
                                                        (l = x.map(function (
                                                            e
                                                        ) {
                                                            return (
                                                                e.id == a.id
                                                                    ? ((n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock +
                                                                                      t,
                                                                              }
                                                                          )),
                                                                      (r =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock:
                                                                                      e.stock +
                                                                                      t,
                                                                              }
                                                                          )))
                                                                    : (n =
                                                                          Object(
                                                                              Te.a
                                                                          )(
                                                                              Object(
                                                                                  Te.a
                                                                              )(
                                                                                  {},
                                                                                  e
                                                                              ),
                                                                              {},
                                                                              {
                                                                                  stock: e.stock,
                                                                              }
                                                                          )),
                                                                n
                                                            );
                                                        })),
                                                        C(l),
                                                        w(l),
                                                        e.abrupt("return", r)
                                                    );
                                                case 7:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        re = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t, n;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    if (!(+a.stock <= 0)) {
                                                        e.next = 3;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "El producto no tiene Stock",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 3:
                                                    return (
                                                        "publico" === K &&
                                                            (Z =
                                                                1 *
                                                                a.precio_publico),
                                                        "tecnico" === K &&
                                                            (Z =
                                                                1 *
                                                                a.precio_tecnico),
                                                        "mayorista" === K &&
                                                            (Z =
                                                                1 *
                                                                a.precio_distribuidor),
                                                        (t = {
                                                            cantidad: 1,
                                                            id: a.id,
                                                            nombre: a.nombre,
                                                            precio_publico:
                                                                a.precio_publico,
                                                            precio_tecnico:
                                                                a.precio_tecnico,
                                                            precio_distribuidor:
                                                                a.precio_distribuidor,
                                                            total: Q(Z),
                                                            totalBruto: Z,
                                                            tipoPrecio: K,
                                                            stock: a.stock,
                                                        }),
                                                        (n = !1),
                                                        console.log(
                                                            "a\xf1adir",
                                                            t
                                                        ),
                                                        (e.next = 11),
                                                        A.map(function (e) {
                                                            e.id === t.id &&
                                                                e.tipoPrecio ===
                                                                    t.tipoPrecio &&
                                                                ((n = !0),
                                                                console.log(
                                                                    "Existe"
                                                                ));
                                                        })
                                                    );
                                                case 11:
                                                    if (!n) {
                                                        e.next = 14;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "El producto ya se encuentra en la factura.",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 14:
                                                    return (e.next = 16), te(t);
                                                case 16:
                                                    e.sent,
                                                        n
                                                            ? (ie(t), me(A))
                                                            : (console.log(
                                                                  "Se a\xf1adio",
                                                                  t
                                                              ),
                                                              R(
                                                                  [].concat(
                                                                      Object(
                                                                          ma.a
                                                                      )(A),
                                                                      [t]
                                                                  )
                                                              ),
                                                              me(A));
                                                case 18:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        le = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a, t) {
                                    var n, r;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        [],
                                                        (n = []),
                                                        (r = S.map(function (
                                                            e
                                                        ) {
                                                            return e.id == a.id
                                                                ? Object(Te.a)(
                                                                      Object(
                                                                          Te.a
                                                                      )({}, e),
                                                                      {},
                                                                      {
                                                                          stock:
                                                                              e.stock -
                                                                              parseInt(
                                                                                  t
                                                                              ),
                                                                      }
                                                                  )
                                                                : Object(Te.a)(
                                                                      Object(
                                                                          Te.a
                                                                      )({}, e),
                                                                      {},
                                                                      {
                                                                          stock: e.stock,
                                                                      }
                                                                  );
                                                        })),
                                                        C(r),
                                                        w(r),
                                                        e.abrupt("return", n)
                                                    );
                                                case 6:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a, t) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ce = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a, t) {
                                    var n;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    le(a, t),
                                                        (n = A.filter(function (
                                                            e
                                                        ) {
                                                            return !(
                                                                e.id === a.id &&
                                                                e.tipoPrecio ===
                                                                    a.tipoPrecio
                                                            );
                                                        })),
                                                        R(n);
                                                case 3:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a, t) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        oe = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r,
                                        l = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t =
                                                            l.length > 1 &&
                                                            void 0 !== l[1]
                                                                ? l[1]
                                                                : 1),
                                                        (e.next = 3),
                                                        ee(a)
                                                    );
                                                case 3:
                                                    if (e.sent) {
                                                        e.next = 7;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "Ya no quedan mas unidades para este producto.",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 7:
                                                    return (
                                                        (e.next = 9), te(a, t)
                                                    );
                                                case 9:
                                                    e.sent,
                                                        (n = 0),
                                                        (r = A.map(function (
                                                            e
                                                        ) {
                                                            return e.id ===
                                                                a.id &&
                                                                e.tipoPrecio ===
                                                                    a.tipoPrecio
                                                                ? ("publico" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_publico),
                                                                  "tecnico" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_tecnico),
                                                                  "mayorista" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_distribuidor),
                                                                  Object(Te.a)(
                                                                      Object(
                                                                          Te.a
                                                                      )({}, e),
                                                                      {},
                                                                      {
                                                                          cantidad:
                                                                              +t,
                                                                          total: Q(
                                                                              ue(
                                                                                  +t *
                                                                                      n,
                                                                                  4
                                                                              )
                                                                          ),
                                                                          totalBruto:
                                                                              ue(
                                                                                  +t *
                                                                                      n,
                                                                                  4
                                                                              ),
                                                                      }
                                                                  ))
                                                                : e;
                                                        })),
                                                        R(r);
                                                case 13:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ie = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r,
                                        l = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t =
                                                            l.length > 1 &&
                                                            void 0 !== l[1]
                                                                ? l[1]
                                                                : 1),
                                                        (e.next = 3),
                                                        ee(a)
                                                    );
                                                case 3:
                                                    if (e.sent) {
                                                        e.next = 7;
                                                        break;
                                                    }
                                                    return (
                                                        ea.a.error(
                                                            "Ya no quedan mas unidades para este producto.",
                                                            2
                                                        ),
                                                        e.abrupt("return")
                                                    );
                                                case 7:
                                                    return (
                                                        (e.next = 9), te(a, t)
                                                    );
                                                case 9:
                                                    e.sent,
                                                        (n = 0),
                                                        (r = A.map(function (
                                                            e
                                                        ) {
                                                            return e.id ===
                                                                a.id &&
                                                                e.tipoPrecio ===
                                                                    a.tipoPrecio
                                                                ? ("publico" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_publico),
                                                                  "tecnico" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_tecnico),
                                                                  "mayorista" ===
                                                                      e.tipoPrecio &&
                                                                      (n =
                                                                          e.precio_distribuidor),
                                                                  Object(Te.a)(
                                                                      Object(
                                                                          Te.a
                                                                      )({}, e),
                                                                      {},
                                                                      {
                                                                          cantidad:
                                                                              e.cantidad +
                                                                              1,
                                                                          total: Q(
                                                                              ue(
                                                                                  (e.cantidad +
                                                                                      1) *
                                                                                      n,
                                                                                  4
                                                                              )
                                                                          ),
                                                                          totalBruto:
                                                                              ue(
                                                                                  (e.cantidad +
                                                                                      1) *
                                                                                      n,
                                                                                  4
                                                                              ),
                                                                      }
                                                                  ))
                                                                : e;
                                                        })),
                                                        R(r);
                                                case 13:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        se = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t,
                                        n,
                                        r = arguments;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    (t =
                                                        r.length > 1 &&
                                                        void 0 !== r[1]
                                                            ? r[1]
                                                            : 1),
                                                        (n = A.map(function (
                                                            e
                                                        ) {
                                                            return e.id ===
                                                                a.id &&
                                                                e.tipoPrecio ===
                                                                    a.tipoPrecio &&
                                                                e.cantidad > 1
                                                                ? (ne(a, t),
                                                                  U(W - t),
                                                                  "publico" ===
                                                                      e.tipoPrecio &&
                                                                      (Z =
                                                                          e.precio_publico),
                                                                  "tecnico" ===
                                                                      e.tipoPrecio &&
                                                                      (Z =
                                                                          e.precio_tecnico),
                                                                  "mayorista" ===
                                                                      e.tipoPrecio &&
                                                                      (Z =
                                                                          e.precio_distribuidor),
                                                                  Object(Te.a)(
                                                                      Object(
                                                                          Te.a
                                                                      )({}, e),
                                                                      {},
                                                                      {
                                                                          cantidad:
                                                                              e.cantidad -
                                                                              1,
                                                                          total: Q(
                                                                              ue(
                                                                                  (e.cantidad -
                                                                                      1) *
                                                                                      Z,
                                                                                  4
                                                                              )
                                                                          ),
                                                                          totalBruto:
                                                                              ue(
                                                                                  (e.cantidad -
                                                                                      1) *
                                                                                      Z,
                                                                                  4
                                                                              ),
                                                                      }
                                                                  ))
                                                                : e;
                                                        })),
                                                        R(n);
                                                case 3:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })();
                    function ue(e) {
                        var a =
                                arguments.length > 1 && void 0 !== arguments[1]
                                    ? arguments[1]
                                    : 0,
                            t = e.toString(),
                            n = (t.length, t.indexOf(".") + 1),
                            r = t.substr(0, n + a);
                        return Number(r);
                    }
                    var me = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a, t, n, r;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        console.log(
                                                            "calcularTotalesFactura",
                                                            A
                                                        ),
                                                        (a = 0),
                                                        (t = 0),
                                                        (n = 0),
                                                        (r = 0),
                                                        (e.next = 7),
                                                        A.map(function (e) {
                                                            (a += e.total),
                                                                (r +=
                                                                    e.totalBruto);
                                                        })
                                                    );
                                                case 7:
                                                    (t = ue(0.12 * a, 4)),
                                                        (n = r),
                                                        G({
                                                            subtotal: ue(a, 4),
                                                            iva: t,
                                                            total: n,
                                                        });
                                                case 10:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        de = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a, t, n, r, l;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (a = new Date()),
                                                        (t = zt.a.format(
                                                            a,
                                                            "YYYY-MM-DD"
                                                        )),
                                                        (n = []),
                                                        (r = {
                                                            cabecera: {
                                                                cliente_id:
                                                                    f.id,
                                                                fecha: t,
                                                                detalle:
                                                                    "" === P
                                                                        ? "CREDITO"
                                                                        : P,
                                                                saldo: Y.total,
                                                                total: Y.total,
                                                            },
                                                            detalle: n,
                                                        }),
                                                        (e.next = 6),
                                                        y.post(qt, r)
                                                    );
                                                case 6:
                                                    return (
                                                        (l = e.sent),
                                                        e.abrupt(
                                                            "return",
                                                            l.data
                                                        )
                                                    );
                                                case 8:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        pe = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a, t, n, r, l, c, o, i;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    if (!(A.length < 1)) {
                                                        e.next = 2;
                                                        break;
                                                    }
                                                    return e.abrupt("return", {
                                                        status: 500,
                                                        mensaje:
                                                            "No ha seleccionado productos a\xfan.",
                                                    });
                                                case 2:
                                                    if ("" !== f.cedula) {
                                                        e.next = 4;
                                                        break;
                                                    }
                                                    return e.abrupt("return", {
                                                        status: 500,
                                                        mensaje:
                                                            "Seleccione un cliente",
                                                    });
                                                case 4:
                                                    if (
                                                        ((a =
                                                            "Factura Guardada"),
                                                        (t = -1),
                                                        !L)
                                                    ) {
                                                        e.next = 11;
                                                        break;
                                                    }
                                                    return (e.next = 9), de();
                                                case 9:
                                                    200 === (n = e.sent).estado
                                                        ? ((t = n.credito.id),
                                                          (a =
                                                              "Factura Guardada como Cr\xe9dito"))
                                                        : (a =
                                                              "Error al guardar el credito.");
                                                case 11:
                                                    return (
                                                        (r = A.map(function (
                                                            e
                                                        ) {
                                                            return {
                                                                producto_id:
                                                                    e.id,
                                                                cantidad:
                                                                    e.cantidad,
                                                                subtotal:
                                                                    e.totalBruto,
                                                                precio_tipo:
                                                                    e.tipoPrecio,
                                                            };
                                                        })),
                                                        (l = new Date()),
                                                        (c = zt.a.format(
                                                            l,
                                                            "YYYY-MM-DD"
                                                        )),
                                                        (o = {
                                                            cabecera: {
                                                                cliente_id:
                                                                    f.id,
                                                                fecha: c,
                                                                subtotal:
                                                                    Y.subtotal,
                                                                iva: Y.iva,
                                                                total: Y.total,
                                                                observacion: P,
                                                                es_credito: L,
                                                                credito_id: t,
                                                                estado: L
                                                                    ? "credito"
                                                                    : "cerrada",
                                                            },
                                                            detalle: Object(
                                                                ma.a
                                                            )(r),
                                                        }),
                                                        (e.next = 17),
                                                        y.post($t, o)
                                                    );
                                                case 17:
                                                    if (
                                                        200 ===
                                                        (i = e.sent).data.estado
                                                    ) {
                                                        e.next = 20;
                                                        break;
                                                    }
                                                    return e.abrupt("return", {
                                                        status: 500,
                                                        mensaje:
                                                            "Ocurri\xf3 un error en el servidor.",
                                                    });
                                                case 20:
                                                    return (
                                                        u(i.data.factura.id),
                                                        g(i.data.factura.fecha),
                                                        k(!0),
                                                        L && E(!0),
                                                        e.abrupt("return", {
                                                            status: 200,
                                                            mensaje: a,
                                                            codigoFac:
                                                                i.data.factura
                                                                    .id,
                                                        })
                                                    );
                                                case 25:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ge = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.get(Yt + a)
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        c(t.data),
                                                        e.abrupt("return", {
                                                            codigo: 200,
                                                            mensaje: "Ok",
                                                            factura: t.data,
                                                        })
                                                    );
                                                case 5:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(
                            function () {
                                me();
                            },
                            [A]
                        ),
                        r.a.createElement(
                            r.a.Fragment,
                            null,
                            r.a.createElement(
                                Ut.Provider,
                                {
                                    value: {
                                        productosFactura: A,
                                        setProductosFactura: R,
                                        agregarProductoFactura: re,
                                        sumarStockProductoFactura: ie,
                                        restarStockProductoFactura: se,
                                        eliminarProductoFactura: ce,
                                        totales: Y,
                                        setObservacion: T,
                                        observacion: P,
                                        guardarFactura: pe,
                                        currentPrecio: K,
                                        setCurrentPrecio: J,
                                        credito: L,
                                        setCredito: M,
                                        factura_id: s,
                                        setFactura_id: u,
                                        fechaFactura: p,
                                        factura: l,
                                        setFactura: c,
                                        fn_obtenerFactura: ge,
                                        numeroItems: W,
                                        SetNumeroItems: U,
                                        sumarStockProductoFacturaCantidad: oe,
                                        productos: x,
                                        actualizarStockProductosCantidad: ae,
                                        calcularTotalesFactura: me,
                                        actualizarProductosFactura: function (
                                            e,
                                            a
                                        ) {
                                            var t = 0,
                                                n = A.map(function (n) {
                                                    return n.id === e.id &&
                                                        n.tipoPrecio ===
                                                            e.tipoPrecio
                                                        ? ("publico" ===
                                                              n.tipoPrecio &&
                                                              (t =
                                                                  n.precio_publico),
                                                          "tecnico" ===
                                                              n.tipoPrecio &&
                                                              (t =
                                                                  n.precio_tecnico),
                                                          "mayorista" ===
                                                              n.tipoPrecio &&
                                                              (t =
                                                                  n.precio_distribuidor),
                                                          Object(Te.a)(
                                                              Object(Te.a)(
                                                                  {},
                                                                  n
                                                              ),
                                                              {},
                                                              {
                                                                  cantidad: a,
                                                                  total: Q(
                                                                      ue(
                                                                          a * t,
                                                                          4
                                                                      )
                                                                  ),
                                                                  totalBruto:
                                                                      ue(
                                                                          a * t,
                                                                          4
                                                                      ),
                                                              }
                                                          ))
                                                        : n;
                                                });
                                            R(n);
                                        },
                                    },
                                },
                                e.children
                            )
                        )
                    );
                },
                Ht = t(692),
                Xt = function (e) {
                    var a = e.ancho,
                        t = void 0 === a ? 300 : a,
                        l = e.concatenarCedula,
                        c = void 0 !== l && l,
                        o = e.defaultCliete,
                        i = void 0 === o ? void 0 : o,
                        s = e.selectInactive,
                        u = void 0 !== s && s,
                        m = Object(n.useContext)(ra),
                        d = m.clientes,
                        p = m.currentCliente,
                        g = m.setCurrentCliente,
                        b =
                            (m.cargarClientes,
                            function (e, a) {
                                return e
                                    ? "" === a.cedula
                                        ? ""
                                        : "CI: " + a.cedula + " - " + a.nombres
                                    : a.nombres;
                            });
                    return void 0 === i
                        ? r.a.createElement(
                              r.a.Fragment,
                              null,
                              r.a.createElement(Ht.a, {
                                  id: "debug",
                                  value: p,
                                  disabled: u,
                                  options: d,
                                  debug: !0,
                                  onChange: function (e, a) {
                                      console.log(a), null !== a && g(a);
                                  },
                                  getOptionLabel: function (e) {
                                      return b(c, e);
                                  },
                                  style: { width: 300 },
                                  renderInput: function (e) {
                                      return r.a.createElement(
                                          _e.a,
                                          Object.assign({}, e, {
                                              style: { width: t },
                                              label: "Seleccione Cliente",
                                              variant: "outlined",
                                          })
                                      );
                                  },
                              })
                          )
                        : r.a.createElement(
                              r.a.Fragment,
                              null,
                              r.a.createElement(Ht.a, {
                                  id: "debug",
                                  disabled: u,
                                  options: d,
                                  value: i,
                                  debug: !0,
                                  defaultValue: void 0 === i ? null : i,
                                  onChange: function (e, a) {
                                      console.log(a), null !== a && g(a);
                                  },
                                  getOptionLabel: function (e) {
                                      return b(c, e);
                                  },
                                  style: { width: 300 },
                                  renderInput: function (e) {
                                      return r.a.createElement(
                                          _e.a,
                                          Object.assign({}, e, {
                                              style: { width: t },
                                              label: "Seleccione Cliente",
                                              variant: "outlined",
                                          })
                                      );
                                  },
                              })
                          );
                },
                Kt = t(412),
                Jt = Object(u.a)(function (e) {
                    return {
                        container: {
                            display: "grid",
                            gridTemplateColumns: "repeat(12, 1fr)",
                            gridGap: e.spacing(3),
                        },
                        paper: {
                            padding: e.spacing(1),
                            textAlign: "center",
                            color: e.palette.text.secondary,
                            whiteSpace: "nowrap",
                            marginBottom: e.spacing(1),
                        },
                        divider: { margin: e.spacing(2, 0) },
                    };
                });
            function Zt() {
                var e = Object(n.useContext)(ra).currentCliente,
                    a = Object(n.useContext)(Ut),
                    t = a.credito,
                    l = a.setCredito,
                    c = Jt(),
                    o = new Date(),
                    i =
                        o.getFullYear() +
                        "-" +
                        (o.getMonth() + 1) +
                        "-" +
                        o.getDate();
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(
                        T.a,
                        { variant: "subtitle1", gutterBottom: !0 },
                        "Facturaci\xf3n"
                    ),
                    r.a.createElement(It.a, {
                        style: { float: "right", marginTop: "-40px" },
                        control: r.a.createElement(Kt.a, {
                            checked: t,
                            onChange: function (e) {
                                l(e.target.checked);
                            },
                            name: "credito",
                            color: "primary",
                        }),
                        label: " \xbfEs cr\xe9dito?",
                    }),
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            style: { fontSize: "12px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 6 },
                            r.a.createElement(Xt, { concatenarCedula: !0 })
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 6 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                r.a.createElement("strong", null, "Fecha:"),
                                " ",
                                i,
                                r.a.createElement("br", null),
                                r.a.createElement("strong", null, "CI. :"),
                                " ",
                                e.cedula,
                                r.a.createElement("br", null),
                                r.a.createElement("strong", null, "Telf. :"),
                                " ",
                                e.telefono
                            )
                        )
                    ),
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            style: { fontSize: "12px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(Bt.a, { className: c.paper }, "*")
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Cant."
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 5 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Nombre producto"
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Precio U."
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Total"
                            )
                        )
                    )
                );
            }
            var Qt = t(147),
                en = t.n(Qt);
            var an = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(3),
                    },
                    paper: {
                        padding: e.spacing(1),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            var tn = function (e) {
                return (function (e) {
                    var a =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : 0,
                        t = e.toString(),
                        n = (t.length, t.indexOf(".") + 1),
                        r = t.substr(0, n + a);
                    return Number(r);
                })(e / 1.12, 4);
            };
            function nn(e) {
                var a = e.producto,
                    t = an(),
                    l = Object(n.useContext)(Ut),
                    c =
                        (l.sumarStockProductoFactura,
                        l.sumarStockProductoFacturaCantidad,
                        l.restarStockProductoFactura,
                        l.eliminarProductoFactura),
                    o = (l.numeroItems, l.SetNumeroItems),
                    i = l.actualizarStockProductosCantidad,
                    s = (l.productos, l.productosFactura),
                    u = l.calcularTotalesFactura,
                    m = l.actualizarProductosFactura,
                    d = Object(n.useState)(1),
                    p = Object(h.a)(d, 2),
                    g = p[0],
                    b = p[1],
                    f = function (e, a) {
                        var t = 0;
                        s.map(function (a) {
                            e.tipoPrecio !== a.tipoPrecio &&
                                (t = parseInt(t) + parseInt(a.cantidad));
                        }),
                            (t = parseInt(t) + parseInt(a)),
                            m(e, a),
                            i(e, t),
                            u(s);
                    };
                return r.a.createElement(
                    "div",
                    { style: { height: "24px" }, key: a.id + a.tipoPrecio },
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            margin: 0,
                            style: { fontSize: "11px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                r.a.createElement(en.a, {
                                    style: { cursor: "pointer" },
                                    onClick: function () {
                                        return (function (e) {
                                            var a = 0;
                                            s.map(function (t) {
                                                e.tipoPrecio !== t.tipoPrecio &&
                                                    (a =
                                                        parseInt(a) +
                                                        parseInt(t.cantidad));
                                            }),
                                                c(e, a);
                                        })(a);
                                    },
                                    color: "action",
                                    fontSize: "inherit",
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                r.a.createElement("input", {
                                    type: "text",
                                    onBlur: function (e) {
                                        return f(a, e.target.value);
                                    },
                                    onChange: function (e) {
                                        return (function (e, a, t) {
                                            a.target.validity.valid &&
                                                (0 != e
                                                    ? e > t.stock
                                                        ? ea.a.error(
                                                              "La cantidad supera el Stock del producto",
                                                              2
                                                          )
                                                        : (b(e), f(t, e), o(e))
                                                    : ea.a.error(
                                                          "La cantidad no puede ser 0",
                                                          2
                                                      ));
                                        })(e.target.value, e, a);
                                    },
                                    value: g,
                                    pattern: "[0-9]{0,13}",
                                    style: {
                                        width: "70px",
                                        height: "14px",
                                        fontSize: "10px",
                                        textAlign: "center",
                                    },
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 5, title: a.nombre },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                a.nombre
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                item: !0,
                                xs: 2,
                                style: { backgroundColor: "#cef2e6" },
                            },
                            r.a.createElement(
                                Bt.a,
                                {
                                    style: { backgroundColor: "#cef2e6" },
                                    className: t.paper,
                                },
                                "publico" === a.tipoPrecio
                                    ? tn(a.precio_publico)
                                    : "",
                                "tecnico" === a.tipoPrecio
                                    ? tn(a.precio_tecnico)
                                    : "",
                                "mayorista" === a.tipoPrecio
                                    ? tn(a.precio_distribuidor)
                                    : ""
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.total
                            )
                        )
                    )
                );
            }
            var rn = t(402),
                ln = t(155),
                cn = t(302),
                on = t(425),
                sn = t.n(on),
                un = t(243),
                mn = t.n(un),
                dn = Object(u.a)(function (e) {
                    return {
                        container: {
                            display: "grid",
                            gridTemplateColumns: "repeat(12, 1fr)",
                            gridGap: e.spacing(3),
                        },
                        paper: {
                            padding: e.spacing(0),
                            textAlign: "center",
                            color: e.palette.text.secondary,
                            whiteSpace: "nowrap",
                            marginBottom: e.spacing(0),
                        },
                        divider: { margin: e.spacing(2, 0) },
                    };
                });
            var pn = function (e) {
                return (function (e) {
                    var a =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : 0,
                        t = e.toString(),
                        n = (t.length, t.indexOf(".") + 1),
                        r = t.substr(0, n + a);
                    return Number(r);
                })(e / 1.12, 4);
            };
            function gn(e) {
                var a = e.producto;
                dn();
                return r.a.createElement(
                    "div",
                    { style: { height: "24px" }, key: a.id + a.tipoPrecio },
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            margin: 0,
                            style: { fontSize: "11px", marginTop: "3px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(
                                "strong",
                                null,
                                " ",
                                a.cantidad,
                                " "
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 7, title: a.nombre },
                            a.nombre
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                item: !0,
                                xs: 2,
                                style: { backgroundColor: "#cef2e6" },
                            },
                            "publico" === a.tipoPrecio
                                ? pn(a.precio_publico)
                                : "",
                            "tecnico" === a.tipoPrecio
                                ? pn(a.precio_tecnico)
                                : "",
                            "mayorista" === a.tipoPrecio
                                ? pn(a.precio_distribuidor)
                                : ""
                        ),
                        r.a.createElement(fe.a, { item: !0, xs: 2 }, a.total)
                    )
                );
            }
            var bn = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(0),
                        fontSize: "12px",
                    },
                    paper: {
                        padding: e.spacing(0),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(0),
                    },
                    paperRight: {
                        padding: e.spacing(0),
                        textAlign: "Right",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(0),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            function fn(e) {
                var a = e.totales,
                    t = bn(),
                    l = Object(n.useContext)(Ut).observacion;
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(F.a, { className: t.divider }),
                    r.a.createElement(
                        "div",
                        { className: t.container },
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL 12% $: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL 0% :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " 0.00"
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "DESCUENTO 0% :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " 0.00"
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "IVA 12%:$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.iva
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "VALOR TOTAL:$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.total
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 9",
                                    marginTop: "3px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paperRight,
                                    style: { textAlign: "left" },
                                },
                                "Observaciones: ",
                                l
                            )
                        ),
                        r.a.createElement("div", {
                            style: {
                                gridColumnEnd: "span 3",
                                textAlign: "center",
                            },
                        })
                    )
                );
            }
            var En = t.p + "static/media/Factura.54ca728a.PNG",
                hn = Object(u.a)(function (e) {
                    return {
                        container: {
                            display: "grid",
                            gridTemplateColumns: "repeat(12, 1fr)",
                            gridGap: e.spacing(3),
                        },
                        paper: {
                            padding: e.spacing(1),
                            textAlign: "left",
                            color: e.palette.text.secondary,
                            whiteSpace: "nowrap",
                            marginBottom: e.spacing(0),
                        },
                        divider: { margin: e.spacing(1, 0) },
                    };
                }),
                vn = r.a.forwardRef(function (e, a) {
                    var t = Object(n.useContext)(Ut),
                        l = t.productosFactura,
                        c = t.totales,
                        o = t.factura_id,
                        i = t.fechaFactura,
                        s = t.credito,
                        u = Object(n.useContext)(ra).currentCliente,
                        m = hn();
                    return r.a.createElement(
                        "div",
                        { ref: a, style: { width: "50%", marginLeft: "19px" } },
                        r.a.createElement("img", {
                            className: "imagenImpresion",
                            src: En,
                        }),
                        r.a.createElement(
                            T.a,
                            { variant: "subtitle1", gutterBottom: !0 },
                            r.a.createElement(
                                "center",
                                null,
                                "N\xb0 Control ",
                                o,
                                " ",
                                s && " (credito)"
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                container: !0,
                                spacing: 0,
                                style: { fontSize: "12px" },
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 12 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: m.paper },
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " CI:"
                                        ),
                                        " ",
                                        u.cedula
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Cliente:"
                                        ),
                                        " ",
                                        u.nombres
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Telf.:"
                                        ),
                                        " ",
                                        u.telefono
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Dir.:"
                                        ),
                                        " ",
                                        u.direccion
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Fecha:"
                                        ),
                                        " ",
                                        i
                                    )
                                )
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                container: !0,
                                spacing: 0,
                                style: { fontSize: "12px" },
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 1 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: m.paper },
                                    "Cant."
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 7 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: m.paper },
                                    "Nombre producto"
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 2 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: m.paper },
                                    "Precio U."
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 2 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: m.paper },
                                    "Total"
                                )
                            )
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            l.map(function (e) {
                                return r.a.createElement(gn, {
                                    key: e.id + e.tipoPrecio,
                                    producto: e,
                                });
                            })
                        ),
                        r.a.createElement(fn, { key: 1, totales: c })
                    );
                }),
                xn = Object(u.a)(function (e) {
                    return {
                        root: { display: "flex", alignItems: "center" },
                        wrapper: { margin: e.spacing(1), position: "relative" },
                        buttonSuccess: {
                            backgroundColor: ln.a[500],
                            "&:hover": { backgroundColor: ln.a[700] },
                        },
                        fabProgress: {
                            color: ln.a[500],
                            position: "absolute",
                            top: -6,
                            left: -6,
                            zIndex: 1,
                        },
                        buttonProgress: {
                            color: ln.a[500],
                            position: "absolute",
                            top: "50%",
                            left: "50%",
                            marginTop: -12,
                            marginLeft: -12,
                        },
                    };
                });
            function On() {
                var e = xn(),
                    a = r.a.useState(!1),
                    t = Object(h.a)(a, 2),
                    l = t[0],
                    c = t[1],
                    o = r.a.useState(!1),
                    i = Object(h.a)(o, 2),
                    s = i[0],
                    u = (i[1], r.a.useRef()),
                    m = Object(n.useContext)(Ut),
                    d = m.guardarFactura,
                    p = m.setProductosFactura,
                    g = m.setObservacion,
                    b = m.setCredito,
                    f = Object(n.useContext)(ra).setCurrentCliente,
                    E = Object(n.useContext)(pt),
                    x = E.productos,
                    C = E.setProductosTemp2,
                    y = Object(q.a)(Object(v.a)({}, e.buttonSuccess, s));
                r.a.useEffect(function () {
                    return (
                        console.log("Se esta renderizando el born guardar"),
                        function () {
                            clearTimeout(u.current);
                        }
                    );
                }, []);
                var w = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                return c(!0), (e.next = 3), d();
                                            case 3:
                                                if (
                                                    ((a = e.sent),
                                                    c(!1),
                                                    200 === a.status)
                                                ) {
                                                    e.next = 8;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(a.mensaje, 2),
                                                    e.abrupt("return")
                                                );
                                            case 8:
                                                k(), ea.a.success(a.mensaje, 2);
                                            case 10:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })(),
                    S = Object(n.useRef)(),
                    k = function () {
                        N();
                    },
                    N = Object(Wt.useReactToPrint)({
                        content: function () {
                            return S.current;
                        },
                        onAfterPrint: function () {
                            p([]),
                                g(""),
                                b(!1),
                                C(x),
                                f({ cedula: "", nombres: "-SELECCIONE-" });
                        },
                    });
                return r.a.createElement(
                    "div",
                    { className: e.root },
                    r.a.createElement(
                        "div",
                        { style: { display: "none" } },
                        r.a.createElement(vn, { ref: S })
                    ),
                    r.a.createElement(
                        "div",
                        { className: e.wrapper },
                        r.a.createElement(
                            cn.a,
                            {
                                "aria-label": "save",
                                color: "primary",
                                className: y,
                                onClick: w,
                            },
                            s
                                ? r.a.createElement(sn.a, null)
                                : r.a.createElement(mn.a, null)
                        ),
                        l &&
                            r.a.createElement(va.a, {
                                size: 68,
                                className: e.fabProgress,
                            })
                    )
                );
            }
            var jn = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(0),
                        fontSize: "12px",
                    },
                    paper: {
                        padding: e.spacing(1),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    paperRight: {
                        padding: e.spacing(1),
                        textAlign: "Right",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            function Cn(e) {
                var a = e.totales,
                    t = jn(),
                    l = Object(n.useContext)(Ut),
                    c = l.observacion,
                    o = l.setObservacion;
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(F.a, { className: t.divider }),
                    r.a.createElement(
                        "div",
                        { className: t.container },
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "IVA 12%: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.iva
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "TOTAL: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paper,
                                    style: {
                                        fontWeight: "bold",
                                        fontSize: "14px",
                                    },
                                },
                                "$ ",
                                a.total
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 9" } },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paperRight,
                                    style: { textAlign: "left" },
                                },
                                r.a.createElement(rn.a, {
                                    defaultValue: c,
                                    onChange: function (e) {
                                        o(e.target.value);
                                    },
                                    style: { width: "100%" },
                                    "aria-label": "minimum height",
                                    rows: 3,
                                    placeholder: "Observaciones",
                                })
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 3",
                                    textAlign: "center",
                                },
                            },
                            r.a.createElement(On, null)
                        )
                    )
                );
            }
            var yn = function () {
                    var e = Object(n.useContext)(Ut),
                        a = e.productosFactura,
                        t = e.totales;
                    return r.a.createElement(
                        "div",
                        null,
                        r.a.createElement(Zt, null),
                        r.a.createElement(
                            "div",
                            { style: { height: "130px", overflow: "auto" } },
                            a.map(function (e) {
                                return r.a.createElement(nn, {
                                    key: e.id + e.tipoPrecio,
                                    producto: e,
                                });
                            })
                        ),
                        r.a.createElement(Cn, { key: 1, totales: t })
                    );
                },
                wn =
                    (t(386),
                    t(601),
                    Object(u.a)(function (e) {
                        return {
                            root: {
                                flexGrow: 1,
                                overflow: "hidden",
                                padding: e.spacing(0, 3),
                            },
                            paper: {
                                maxWidth: "100%",
                                margin: "".concat(e.spacing(1), "px auto"),
                                padding: e.spacing(1),
                            },
                        };
                    })),
                Sn = function (e) {
                    e.classes;
                    var a = e.productos,
                        t = wn(),
                        l = Object(n.useContext)(Ut).agregarProductoFactura;
                    return r.a.createElement(
                        "div",
                        { style: { height: "370px", overflow: "auto" } },
                        a.map(function (e) {
                            if (e.stock > 0)
                                return r.a.createElement(
                                    "div",
                                    { key: e.id },
                                    r.a.createElement(
                                        Bt.a,
                                        {
                                            id: "productoTabla",
                                            style: {
                                                cursor: "pointer",
                                                fontSize: "12px",
                                                fontFamily: "Roboto",
                                                textAlign: "justify",
                                            },
                                            className: t.paper,
                                            onClick: function () {
                                                return (function (e) {
                                                    l(e);
                                                })(e);
                                            },
                                        },
                                        r.a.createElement(
                                            fe.a,
                                            {
                                                container: !0,
                                                wrap: "nowrap",
                                                spacing: 1,
                                            },
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0 },
                                                r.a.createElement(
                                                    P.a,
                                                    {
                                                        title:
                                                            "Stock " + e.stock,
                                                    },
                                                    e.stock
                                                )
                                            ),
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0, xs: !0 },
                                                r.a.createElement(
                                                    "strong",
                                                    {
                                                        style: {
                                                            color: "#3f51b5",
                                                        },
                                                    },
                                                    e.nombre
                                                ),
                                                r.a.createElement("br", null),
                                                e.descripcion
                                            ),
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0, xs: 3 },
                                                "P. P\xfablico $",
                                                e.precio_publico,
                                                r.a.createElement("br", null),
                                                "P. T\xe9cnico $",
                                                e.precio_tecnico,
                                                r.a.createElement("br", null),
                                                "P. Mayorista $",
                                                e.precio_distribuidor
                                            )
                                        ),
                                        r.a.createElement(
                                            fe.a,
                                            {
                                                item: !0,
                                                xs: 12,
                                                style: { fontSize: "9px" },
                                            },
                                            "Cod: ",
                                            e.codigo_barra
                                        )
                                    )
                                );
                        })
                    );
                },
                kn =
                    (t(290),
                    function (e) {
                        var a = e.classes,
                            t = Object(n.useContext)(pt),
                            l = t.setProductosTemp,
                            c = t.productos;
                        return r.a.createElement(
                            Bt.a,
                            { className: a.paper },
                            r.a.createElement(_e.a, {
                                fullWidth: !0,
                                onChange: function (e) {
                                    var a = c.filter(function (a) {
                                        var t = a.nombre.toUpperCase(),
                                            n = e.target.value.toUpperCase(),
                                            r =
                                                null === a.codigo_barra
                                                    ? "".toString()
                                                    : a.codigo_barra.toString(),
                                            l = e.target.value.toString();
                                        return (
                                            t.indexOf(n) > -1 ||
                                            r.indexOf(l) > -1
                                        );
                                    });
                                    l(a);
                                },
                                InputProps: {
                                    startAdornment: r.a.createElement(
                                        Je.a,
                                        { position: "start" },
                                        r.a.createElement(
                                            Ze.a,
                                            {
                                                fontSize: "inherit",
                                                color: "action",
                                            },
                                            r.a.createElement(ca.a, null)
                                        )
                                    ),
                                },
                                placeholder: "Buscar Producto",
                                variant: "outlined",
                            })
                        );
                    }),
                Nn = t(71),
                In = t(303),
                Pn = t.n(In),
                Tn = t(616),
                Fn = Object(Nn.a)({
                    root: {
                        color: Pn.a[600],
                        "&$checked": { color: Pn.a[500] },
                    },
                    checked: {},
                });
            var _n = function () {
                    var e = Object(n.useContext)(Ut),
                        a = e.currentPrecio,
                        t = e.setCurrentPrecio,
                        l = Fn();
                    function c(e) {
                        t(e.target.value), console.log(e.target.value);
                    }
                    return r.a.createElement(
                        "div",
                        null,
                        r.a.createElement(Tn.a, {
                            checked: "publico" === a,
                            onChange: c,
                            value: "publico",
                            name: "radio-button-demo",
                            "aria-label": "A",
                        }),
                        "P. P\xfablico",
                        r.a.createElement(Tn.a, {
                            checked: "tecnico" === a,
                            onChange: c,
                            value: "tecnico",
                            name: "radio-button-demo",
                            "aria-label": "B",
                        }),
                        "P. T\xe9cnico",
                        r.a.createElement(Tn.a, {
                            checked: "mayorista" === a,
                            onChange: c,
                            value: "mayorista",
                            name: "radio-button-demo",
                            "aria-label": "C",
                            classes: { root: l.root, checked: l.checked },
                        }),
                        "P. Mayorista"
                    );
                },
                An = function (e) {
                    var a = e.classes,
                        t = e.productos,
                        n = e.setProductos,
                        l = e.buscarProductos;
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(kn, {
                            buscarProductos: l,
                            productos: t,
                            classes: a,
                            setProductos: n,
                        }),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 12 },
                            r.a.createElement(
                                Bt.a,
                                { className: a.paper },
                                r.a.createElement(
                                    "strong",
                                    null,
                                    "Seleccione Productos"
                                ),
                                r.a.createElement(_n, null)
                            )
                        ),
                        r.a.createElement(Sn, { productos: t, classes: a })
                    );
                },
                Rn = Object(u.a)(function (e) {
                    return {
                        root: { flexGrow: 1 },
                        margin: { margin: e.spacing(1) },
                        paper: {
                            padding: e.spacing(2),
                            textAlign: "center",
                            color: e.palette.text.secondary,
                        },
                        paper2: {
                            padding: e.spacing(1),
                            textAlign: "left",
                            color: e.palette.text.secondary,
                            height: "35px",
                        },
                    };
                }),
                Bn = function () {
                    Object(i.g)();
                    var e = Rn(),
                        a = Object(n.useContext)(pt),
                        t = a.ObtenerProductos,
                        l = (a.productos, a.setProductos),
                        c = a.buscarProductos,
                        o = a.productosTemp,
                        s = Object(n.useContext)(ra).setCurrentCliente;
                    return (
                        r.a.useEffect(function () {
                            s({ cedula: "", nombres: "-SELECCIONE-" }), t();
                        }, []),
                        r.a.createElement(
                            "div",
                            { className: e.root },
                            r.a.createElement(
                                fe.a,
                                { container: !0, spacing: 1 },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12 },
                                    r.a.createElement(
                                        Bt.a,
                                        { className: e.paper },
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            "Punto de venta"
                                        )
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12, sm: 5 },
                                    r.a.createElement(An, {
                                        setProductos: l,
                                        buscarProductos: c,
                                        productos: o,
                                        classes: e,
                                    })
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12, sm: 7 },
                                    r.a.createElement(
                                        Bt.a,
                                        { className: e.paper },
                                        r.a.createElement(yn, null)
                                    )
                                )
                            )
                        )
                    );
                },
                Dn =
                    (Object(u.a)(function (e) {
                        return {
                            root: {},
                            avatar: { marginRight: e.spacing(2) },
                        };
                    }),
                    Object(u.a)(function (e) {
                        return {
                            root: {},
                            importButton: { marginRight: e.spacing(1) },
                            exportButton: { marginRight: e.spacing(1) },
                        };
                    }),
                    Object(u.a)(function (e) {
                        return {
                            root: { "& > *": { margin: e.spacing(1) } },
                            root1: {
                                "& .MuiTextField-root": {
                                    margin: e.spacing(1),
                                    width: "25ch",
                                },
                            },
                            importButton: { marginRight: e.spacing(1) },
                            exportButton: { marginRight: e.spacing(1) },
                        };
                    }),
                    t(607)),
                Ln = t(244),
                Mn = t.n(Ln),
                Vn = t(602),
                zn = t(606),
                Wn = t(604),
                Un = t(605),
                qn = t(603);
            function $n() {
                var e = Object(n.useContext)(Mt),
                    a = e.isOpenModalAbono,
                    t = e.SetIsOpenModalAbono,
                    l = e.guardarAbono,
                    c = e.currentCredito,
                    o = e.isLoading,
                    i = (e.setIsLoading, Object(n.useState)(0)),
                    s = Object(h.a)(i, 2),
                    u = s[0],
                    m = s[1],
                    d = function () {
                        t(!1);
                    };
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(
                        Vn.a,
                        {
                            open: a,
                            onClose: d,
                            "aria-labelledby": "form-dialog-title",
                        },
                        r.a.createElement(
                            qn.a,
                            { id: "form-dialog-title" },
                            "Agregar Abono"
                        ),
                        r.a.createElement(
                            Wn.a,
                            null,
                            r.a.createElement(
                                Un.a,
                                null,
                                "Descripci\xf3n: ",
                                c.detalle
                            ),
                            r.a.createElement(_e.a, {
                                autoFocus: !0,
                                margin: "dense",
                                id: "name",
                                onChange: function (e) {
                                    return m(e.target.value);
                                },
                                label: "$ 0.00",
                                type: "number",
                                fullWidth: !0,
                            })
                        ),
                        r.a.createElement(
                            zn.a,
                            null,
                            r.a.createElement(
                                Y.a,
                                { onClick: d, color: "primary" },
                                "Cancelar"
                            ),
                            r.a.createElement(
                                Y.a,
                                {
                                    onClick: function () {
                                        l(u);
                                    },
                                    color: "primary",
                                },
                                "Guardar"
                            )
                        ),
                        o ? r.a.createElement(La.a, null) : null
                    )
                );
            }
            Object(u.a)({ table: { minWidth: 650 } });
            var Yn = t(608),
                Gn = t(132),
                Hn = t.n(Gn),
                Xn = t(131),
                Kn = t.n(Xn),
                Jn = Object(u.a)({ table: { minWidth: 700 } });
            function Zn(e) {
                return "".concat(e.toFixed(2));
            }
            function Qn(e, a, t) {
                return {
                    desc: e,
                    qty: a,
                    unit: t,
                    price: (function (e, a) {
                        return e * a;
                    })(a, t),
                };
            }
            var er = [
                Qn("Paperclips (Box)", 100, 1.15),
                Qn("Paper (Case)", 10, 45.99),
                Qn("Waste Basket", 2, 17.99),
            ];
            er.map(function (e) {
                return e.price;
            }).reduce(function (e, a) {
                return e + a;
            }, 0);
            function ar(e) {
                var a = e.factura,
                    t = Jn();
                return r.a.createElement(
                    Dn.a,
                    {
                        component: Bt.a,
                        style: { backgroundColor: "rgba(217, 217, 217, 0.29)" },
                    },
                    r.a.createElement("strong", null, "Cliente: "),
                    " ",
                    a.cliente,
                    r.a.createElement(
                        ze.a,
                        { className: t.table, "aria-label": "spanning table" },
                        r.a.createElement(
                            We.a,
                            null,
                            r.a.createElement(
                                Ue.a,
                                { style: { backgroundColor: "#9d9d9d5e" } },
                                r.a.createElement(qe.a, null, "Producto"),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    "Cant."
                                ),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    "T. Unit"
                                ),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    "Total"
                                )
                            )
                        ),
                        r.a.createElement(
                            $e.a,
                            null,
                            a.detalles.map(function (e) {
                                return r.a.createElement(
                                    Ue.a,
                                    { key: e.producto },
                                    r.a.createElement(qe.a, null, e.producto),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        e.cantidad
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        (function (e) {
                                            var a =
                                                    arguments.length > 1 &&
                                                    void 0 !== arguments[1]
                                                        ? arguments[1]
                                                        : 0,
                                                t = e.toString(),
                                                n =
                                                    (t.length,
                                                    t.indexOf(".") + 1),
                                                r = t.substr(0, n + a);
                                            return Number(r);
                                        })(e.subtotal / e.cantidad / 1.12, 4)
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        Zn(
                                            e.cantidad *
                                                (e.subtotal / e.cantidad / 1.12)
                                        )
                                    )
                                );
                            }),
                            r.a.createElement(
                                Ue.a,
                                null,
                                r.a.createElement(qe.a, { rowSpan: 3 }),
                                r.a.createElement(
                                    qe.a,
                                    { colSpan: 2 },
                                    "Subtotal"
                                ),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    Zn(a.subtotal)
                                )
                            ),
                            r.a.createElement(
                                Ue.a,
                                null,
                                r.a.createElement(qe.a, null, "IVA"),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    "".concat((12).toFixed(0), " %")
                                ),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    Zn(a.iva)
                                )
                            ),
                            r.a.createElement(
                                Ue.a,
                                null,
                                r.a.createElement(
                                    qe.a,
                                    { colSpan: 2 },
                                    "Total"
                                ),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    Zn(a.total)
                                )
                            )
                        )
                    )
                );
            }
            var tr = Object(u.a)({
                table: {
                    minWidth: 400,
                    width: "50%",
                    backgroundColor: "#f9f3ff",
                },
            });
            function nr(e) {
                return "".concat(e.toFixed(2));
            }
            function rr(e, a, t) {
                return {
                    desc: e,
                    qty: a,
                    unit: t,
                    price: (function (e, a) {
                        return e * a;
                    })(a, t),
                };
            }
            !(function (e) {
                e.map(function (e) {
                    return e.price;
                }).reduce(function (e, a) {
                    return e + a;
                }, 0);
            })([
                rr("2021-12-01", 100, 1.15),
                rr("2021-12-02", 10, 45.99),
                rr("2021-12-04", 2, 17.99),
            ]);
            function lr(e) {
                var a = e.pagos,
                    t = e.totalAbonado,
                    n = tr();
                return r.a.createElement(
                    Dn.a,
                    { component: Bt.a },
                    r.a.createElement(
                        ze.a,
                        { className: n.table, "aria-label": "spanning table" },
                        r.a.createElement(
                            We.a,
                            null,
                            r.a.createElement(
                                Ue.a,
                                null,
                                r.a.createElement(qe.a, null, "Fecha"),
                                r.a.createElement(
                                    qe.a,
                                    { align: "right" },
                                    "Abono."
                                )
                            )
                        ),
                        r.a.createElement(
                            $e.a,
                            null,
                            a.map(function (e) {
                                return r.a.createElement(
                                    Ue.a,
                                    { key: e.id },
                                    r.a.createElement(qe.a, null, e.fecha),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        nr(e.abono)
                                    )
                                );
                            }),
                            r.a.createElement(
                                Ue.a,
                                null,
                                r.a.createElement(qe.a, null),
                                r.a.createElement(
                                    qe.a,
                                    { colSpan: 4 },
                                    "Total Abono $",
                                    nr(t)
                                ),
                                r.a.createElement(qe.a, { align: "right" })
                            )
                        )
                    )
                );
            }
            var cr = Object(u.a)({
                root: { "& > *": { borderBottom: "unset" } },
            });
            function or(e) {
                var a = e.title,
                    t = e.factura,
                    n = r.a.useState(!1),
                    l = Object(h.a)(n, 2),
                    c = l[0],
                    o = l[1],
                    i = cr();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        Ue.a,
                        { className: i.root },
                        r.a.createElement(
                            qe.a,
                            { component: "th", scope: "row" },
                            r.a.createElement(
                                ee.a,
                                {
                                    "aria-label": "expand row",
                                    size: "small",
                                    onClick: function () {
                                        return o(!c);
                                    },
                                },
                                c
                                    ? r.a.createElement(Kn.a, null)
                                    : r.a.createElement(Hn.a, null)
                            ),
                            " ",
                            r.a.createElement("strong", null, a)
                        )
                    ),
                    r.a.createElement(
                        Ue.a,
                        null,
                        r.a.createElement(
                            qe.a,
                            {
                                style: { paddingBottom: 0, paddingTop: 0 },
                                colSpan: 6,
                            },
                            r.a.createElement(
                                Yn.a,
                                { in: c, timeout: "auto", unmountOnExit: !0 },
                                r.a.createElement(
                                    I.a,
                                    { margin: 1 },
                                    r.a.createElement(ar, {
                                        key: "com_fac_" + t.id,
                                        factura: t,
                                    })
                                )
                            )
                        )
                    )
                );
            }
            function ir(e) {
                var a = e.title,
                    t = e.pagos,
                    n = e.keyPago,
                    l = e.totalAbonado,
                    c = r.a.useState(!1),
                    o = Object(h.a)(c, 2),
                    i = o[0],
                    s = o[1],
                    u = cr();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        Ue.a,
                        { className: u.root },
                        r.a.createElement(
                            qe.a,
                            { component: "th", scope: "row" },
                            r.a.createElement(
                                ee.a,
                                {
                                    "aria-label": "expand row",
                                    size: "small",
                                    onClick: function () {
                                        return s(!i);
                                    },
                                },
                                i
                                    ? r.a.createElement(Kn.a, null)
                                    : r.a.createElement(Hn.a, null)
                            ),
                            a
                        )
                    ),
                    r.a.createElement(
                        Ue.a,
                        null,
                        r.a.createElement(
                            qe.a,
                            {
                                style: { paddingBottom: 0, paddingTop: 0 },
                                colSpan: 6,
                            },
                            r.a.createElement(
                                Yn.a,
                                { in: i, timeout: "auto", unmountOnExit: !0 },
                                r.a.createElement(
                                    I.a,
                                    { margin: 1 },
                                    r.a.createElement(lr, {
                                        key: "comp_pa_" + n,
                                        pagos: t,
                                        totalAbonado: l,
                                    })
                                )
                            )
                        )
                    )
                );
            }
            function sr(e) {
                var a = e.factura,
                    t = e.pagos,
                    n = e.totalAbonado;
                return r.a.createElement(
                    Dn.a,
                    { component: Bt.a },
                    r.a.createElement(
                        ze.a,
                        { "aria-label": "collapsible table" },
                        r.a.createElement(
                            $e.a,
                            null,
                            r.a.createElement(or, {
                                factura: a,
                                key: "___fac00" + a.id,
                                title: "Factura N\xb0 " + a.id,
                            }),
                            r.a.createElement(ir, {
                                pagos: t,
                                totalAbonado: n,
                                key: "___pags00" + a.id,
                                keyPago: "___Pag_p_00" + a.id,
                                title: "Pagos/Abonos",
                            })
                        )
                    )
                );
            }
            var ur = Object(u.a)({ table: { minWidth: 650 } }),
                mr = Object(u.a)({
                    root: { "& > *": { borderBottom: "unset" } },
                });
            function dr(e) {
                var a = e.credito,
                    t = r.a.useState(!1),
                    l = Object(h.a)(t, 2),
                    c = l[0],
                    o = l[1],
                    i = mr(),
                    s = Object(n.useContext)(Mt),
                    u = s.SetIsOpenModalAbono,
                    m = s.setCurrentCredito;
                s.creditos,
                    s.recargarListaCreditos,
                    s.setRecargarListaCreditos,
                    s.recargarFiltro,
                    s.setRecargarFiltro;
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        Ue.a,
                        { className: i.root },
                        r.a.createElement(
                            qe.a,
                            null,
                            r.a.createElement(
                                ee.a,
                                {
                                    "aria-label": "expand row",
                                    size: "small",
                                    onClick: function () {
                                        return o(!c);
                                    },
                                },
                                c
                                    ? r.a.createElement(Kn.a, null)
                                    : r.a.createElement(Hn.a, null)
                            )
                        ),
                        r.a.createElement(
                            qe.a,
                            {
                                style: {
                                    backgroundColor: "#f0f3ff",
                                    textAlign: "center",
                                },
                                component: "th",
                                scope: "row",
                            },
                            a.factura.id
                        ),
                        r.a.createElement(
                            qe.a,
                            { component: "th", scope: "row" },
                            a.fecha
                        ),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            " ",
                            a.detalle
                        ),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            " ",
                            a.cliente
                        ),
                        r.a.createElement(qe.a, { align: "right" }, a.telefono),
                        r.a.createElement(qe.a, { align: "right" }, a.total),
                        r.a.createElement(qe.a, { align: "right" }, a.abono),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            " ",
                            a.saldo
                        ),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            r.a.createElement(Mn.a, {
                                fontSize: "small",
                                onClick: function () {
                                    return (function (e) {
                                        m(e), u(!0);
                                    })(a);
                                },
                            })
                        )
                    ),
                    r.a.createElement(
                        Ue.a,
                        null,
                        r.a.createElement(
                            qe.a,
                            {
                                style: { paddingBottom: 0, paddingTop: 0 },
                                colSpan: 6,
                            },
                            r.a.createElement(
                                Yn.a,
                                { in: c, timeout: "auto", unmountOnExit: !0 },
                                r.a.createElement(
                                    I.a,
                                    { margin: 1 },
                                    r.a.createElement(sr, {
                                        factura: a.factura,
                                        pagos: a.pagos,
                                        totalAbonado: a.abono,
                                    })
                                )
                            )
                        )
                    )
                );
            }
            function pr() {
                var e = ur(),
                    a = Object(n.useContext)(Mt),
                    t =
                        (a.SetIsOpenModalAbono,
                        a.setCurrentCredito,
                        a.creditos),
                    l = a.recargarListaCreditos,
                    c = (a.setRecargarListaCreditos, a.recargarFiltro),
                    o = a.setRecargarFiltro,
                    i = Object(n.useState)(t),
                    s = Object(h.a)(i, 2),
                    u = s[0],
                    m = s[1],
                    d = Object(n.useState)(l),
                    p = Object(h.a)(d, 2),
                    g = p[0],
                    b = p[1];
                return (
                    Object(n.useEffect)(
                        function () {
                            g && (m(t), o(!1)), c && (m(t), o(!1));
                        },
                        [t, u]
                    ),
                    r.a.createElement(
                        Dn.a,
                        { component: Bt.a },
                        r.a.createElement($n, null),
                        r.a.createElement(
                            Bt.a,
                            { className: e.paper },
                            r.a.createElement(_e.a, {
                                fullWidth: !0,
                                onChange: function (e) {
                                    return (function (e) {
                                        var a = t.filter(function (a) {
                                            var t = a.cliente.toUpperCase(),
                                                n = e.toUpperCase(),
                                                r = a.factura.id.toString(),
                                                l = e.toString();
                                            return (
                                                r.indexOf(l) > -1 ||
                                                t.indexOf(n) > -1
                                            );
                                        });
                                        b(!1), m(a);
                                    })(e.target.value);
                                },
                                InputProps: {
                                    startAdornment: r.a.createElement(
                                        Je.a,
                                        { position: "start" },
                                        r.a.createElement(
                                            Ze.a,
                                            {
                                                fontSize: "inherit",
                                                color: "action",
                                            },
                                            r.a.createElement(ca.a, null)
                                        )
                                    ),
                                },
                                placeholder: "Buscar credito",
                                variant: "outlined",
                            })
                        ),
                        r.a.createElement(
                            ze.a,
                            { "aria-label": "collapsible table" },
                            r.a.createElement(
                                We.a,
                                null,
                                r.a.createElement(
                                    Ue.a,
                                    null,
                                    r.a.createElement(qe.a, null),
                                    r.a.createElement(
                                        qe.a,
                                        {
                                            style: {
                                                backgroundColor: "#f0f3ff",
                                            },
                                        },
                                        "Fact. referencia"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        null,
                                        "Fecha cr\xe9dito"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Descripci\xf3n"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Cliente"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Tel\xe9fono"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Total"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Abono"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Saldo"
                                    )
                                )
                            ),
                            r.a.createElement(
                                $e.a,
                                null,
                                u.map(function (e) {
                                    return r.a.createElement(dr, {
                                        key: "___" + e.id,
                                        credito: e,
                                    });
                                })
                            )
                        )
                    )
                );
            }
            var gr = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                    };
                }),
                br = function () {
                    var e = Object(n.useContext)(ra),
                        a = (e.isNewClient, e.clientes, e.setClientes, gr());
                    return r.a.createElement(
                        he,
                        { className: a.root, title: "Clientes" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: !1 },
                            r.a.createElement("h2", null, "CREDITOS"),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(pr, null)
                            )
                        )
                    );
                },
                fr = Object(n.createContext)(),
                Er = "api/tecnicos",
                hr = function (e) {
                    var a = Object(n.useState)([]),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1];
                    Object(n.useEffect)(function () {
                        m();
                    }, []);
                    var m = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                return (e.next = 2), y.get(Er);
                                            case 2:
                                                (a = e.sent), c(a.data);
                                            case 4:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })();
                    return r.a.createElement(
                        fr.Provider,
                        {
                            value: {
                                tecnicos: l,
                                currentTecnico: s,
                                setCurrentTecnico: u,
                            },
                        },
                        e.children
                    );
                },
                vr = t.p + "public/static/media/LogoIngreso.1cc50be9.PNG",
                xr = r.a.forwardRef(function (e, a) {
                    var t = e.datosImpresion,
                        n = t.orden,
                        l = t.cliente;
                    t.tecnico;
                    if (void 0 !== n)
                        return r.a.createElement(
                            "div",
                            { ref: a },
                            r.a.createElement(
                                "div",
                                {
                                    style: {
                                        width: "100%",
                                        color: "black",
                                        marginLeft: "19px",
                                    },
                                },
                                r.a.createElement("img", {
                                    className: "imagenImpresion",
                                    src: vr,
                                }),
                                r.a.createElement(
                                    "center",
                                    null,
                                    r.a.createElement(
                                        "h3",
                                        null,
                                        "INGRESO N\xb0 ",
                                        n.id,
                                        " "
                                    )
                                ),
                                r.a.createElement(
                                    "table",
                                    { style: { width: "500px" } },
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Nombre "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            { colspan: "3" },
                                            " ",
                                            l.nombres
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "C\xe9dula "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            " ",
                                            l.cedula
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Tel\xe9fono "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            " ",
                                            l.telefono
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Equipo "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            " ",
                                            n.equipo
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "N\xb0 Serie "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            " ",
                                            n.serie
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Marca "
                                            )
                                        ),
                                        r.a.createElement("td", null, n.marca),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Fecha Ingreso "
                                            )
                                        ),
                                        r.a.createElement("td", null, n.fecha)
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Modelo "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            { colspan: "3" },
                                            n.modelo
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            { colspan: "4" },
                                            r.a.createElement("hr", {
                                                style: {
                                                    borderBottom:
                                                        "2px dotted black",
                                                    width: "100%",
                                                },
                                            })
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            1 === n.camara
                                                ? r.a.createElement("input", {
                                                      type: "checkbox",
                                                      id: "camara",
                                                      name: "name",
                                                      checked: "checked",
                                                  })
                                                : r.a.createElement(
                                                      "label",
                                                      {
                                                          style: {
                                                              border: "1px solid red",
                                                              color: "red",
                                                          },
                                                      },
                                                      "X"
                                                  ),
                                            " ",
                                            "C\xe1mara"
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            1 === n.teclado
                                                ? r.a.createElement("input", {
                                                      type: "checkbox",
                                                      id: "camara",
                                                      name: "name",
                                                      checked: "checked",
                                                  })
                                                : r.a.createElement(
                                                      "label",
                                                      {
                                                          style: {
                                                              border: "1px solid red",
                                                              color: "red",
                                                          },
                                                      },
                                                      "X"
                                                  ),
                                            " ",
                                            "Teclado"
                                        ),
                                        r.a.createElement("td", {
                                            colspan: "2",
                                        })
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            1 === n.microfono
                                                ? r.a.createElement("input", {
                                                      type: "checkbox",
                                                      id: "camara",
                                                      name: "name",
                                                      checked: "checked",
                                                  })
                                                : r.a.createElement(
                                                      "label",
                                                      {
                                                          style: {
                                                              border: "1px solid red",
                                                              color: "red",
                                                          },
                                                      },
                                                      "X"
                                                  ),
                                            " ",
                                            "Micr\xf3fono"
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            1 === n.parlantes
                                                ? r.a.createElement("input", {
                                                      type: "checkbox",
                                                      id: "camara",
                                                      name: "name",
                                                      checked: "checked",
                                                  })
                                                : r.a.createElement(
                                                      "label",
                                                      {
                                                          style: {
                                                              border: "1px solid red",
                                                              color: "red",
                                                          },
                                                      },
                                                      "X"
                                                  ),
                                            " ",
                                            "Parlantes"
                                        ),
                                        r.a.createElement("td", {
                                            colspan: "2",
                                        })
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Falla "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            { colspan: "3" },
                                            " ",
                                            n.falla
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Observaci\xf3n "
                                            )
                                        ),
                                        r.a.createElement(
                                            "td",
                                            { colspan: "3" },
                                            n.observacion
                                        )
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            null,
                                            "Total : $",
                                            n.total
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            "Abono: $",
                                            n.abono
                                        ),
                                        r.a.createElement(
                                            "td",
                                            null,
                                            " Saldo: $",
                                            n.saldo,
                                            " "
                                        ),
                                        r.a.createElement("td", null)
                                    ),
                                    r.a.createElement(
                                        "tr",
                                        null,
                                        r.a.createElement(
                                            "td",
                                            {
                                                colspan: "4",
                                                style: { textAlign: "justify" },
                                            },
                                            r.a.createElement("hr", {
                                                style: {
                                                    borderBottom:
                                                        "1px dotted black",
                                                    width: "100%",
                                                },
                                            }),
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Nota: "
                                            ),
                                            " Estimado cliente, pasado los 60 d\xedas no nos responsabilizamos por el estado de su equipo. Revisi\xf3n minima $5 dolares.",
                                            " "
                                        )
                                    )
                                )
                            )
                        );
                }),
                Or = Object(n.createContext)(),
                jr = "api/ordenes",
                Cr = "api/ordenes",
                yr = "api/ordenes",
                wr = "api/ordenes",
                Sr = "api/ordenes/abonos/nuevoabono",
                kr = "api/ordenes/total/actualizar",
                Nr = function (e) {
                    var a = Object(n.useState)([]),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)([]),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = Object(n.useState)(!1),
                        d = Object(h.a)(m, 2),
                        p = d[0],
                        g = d[1],
                        b = Object(n.useState)(!1),
                        f = Object(h.a)(b, 2),
                        E = f[0],
                        v = f[1],
                        x = Object(n.useState)(!1),
                        C = Object(h.a)(x, 2),
                        w = C[0],
                        S = C[1],
                        k = Object(n.useState)(!0),
                        N = Object(h.a)(k, 2),
                        I = N[0],
                        P = N[1],
                        T = Object(n.useContext)(ra),
                        F = T.clientes,
                        _ = T.buscarCliente,
                        A = Object(n.useContext)(da),
                        R = A.setIsReload,
                        B = A.fn_anularFactura,
                        D = Object(n.useState)([]),
                        L = Object(h.a)(D, 2),
                        M = L[0],
                        V = L[1],
                        z = Object(n.useState)([]),
                        W = Object(h.a)(z, 2),
                        U = W[0],
                        q = W[1],
                        $ = Object(n.useState)(!1),
                        Y = Object(h.a)($, 2),
                        G = Y[0],
                        H = Y[1],
                        X = Object(n.useState)(!1),
                        K = Object(h.a)(X, 2),
                        J = K[0],
                        Z = K[1],
                        Q = Object(n.useState)(!1),
                        ee = Object(h.a)(Q, 2),
                        ae = ee[0],
                        te = ee[1],
                        ne = Object(n.useState)({
                            camara: !1,
                            teclado: !1,
                            microfono: !1,
                            parlantes: !1,
                            pantalla: !1,
                        }),
                        re = Object(h.a)(ne, 2),
                        le = re[0],
                        ce = re[1],
                        oe = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t = {
                                                            orden_id:
                                                                U.orden.id,
                                                            abono: a,
                                                        }),
                                                        (e.next = 3),
                                                        y.post(Sr, t)
                                                    );
                                                case 3:
                                                    return (
                                                        e.sent,
                                                        P(!0),
                                                        e.abrupt("return", {
                                                            codigo: 200,
                                                            mensaje:
                                                                "Abono Registrado.",
                                                        })
                                                    );
                                                case 6:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ie = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (t = {
                                                            orden_id:
                                                                U.orden.id,
                                                            total: a,
                                                        }),
                                                        (e.next = 3),
                                                        y.post(kr, t)
                                                    );
                                                case 3:
                                                    return (
                                                        e.sent,
                                                        P(!0),
                                                        e.abrupt("return", {
                                                            codigo: 200,
                                                            mensaje:
                                                                "Total Actualizado.",
                                                        })
                                                    );
                                                case 6:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        se = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t, n;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    if (
                                                        (console.log(
                                                            "Orden a imprimir",
                                                            a
                                                        ),
                                                        void 0 !==
                                                            (t = F.filter(
                                                                function (e) {
                                                                    return (
                                                                        e.id ===
                                                                        a.cliente_id
                                                                    );
                                                                }
                                                            )))
                                                    ) {
                                                        e.next = 4;
                                                        break;
                                                    }
                                                    return e.abrupt("return");
                                                case 4:
                                                    if (0 != t.length) {
                                                        e.next = 9;
                                                        break;
                                                    }
                                                    return (
                                                        (e.next = 7),
                                                        _(a.cliente_id)
                                                    );
                                                case 7:
                                                    (n = e.sent),
                                                        (t = [
                                                            Object(Te.a)({}, n),
                                                        ]);
                                                case 9:
                                                    q({
                                                        cliente: {
                                                            nombres:
                                                                t[0].nombres,
                                                            cedula: t[0].cedula,
                                                            telefono:
                                                                t[0].telefono,
                                                        },
                                                        tecnico: {
                                                            nombres:
                                                                localStorage.getItem(
                                                                    "nombres"
                                                                ),
                                                        },
                                                        orden: {
                                                            id: a.id,
                                                            cliente_id:
                                                                a.cliente_id,
                                                            equipo: a.equipo,
                                                            serie: a.serie,
                                                            marca: a.marca,
                                                            modelo: a.modelo,
                                                            observacion:
                                                                a.observacion,
                                                            falla: a.falla,
                                                            trabajo: a.trabajo,
                                                            total: a.total,
                                                            abono: a.abono,
                                                            saldo: a.saldo,
                                                            fecha: a.fecha,
                                                            camara: a.camara,
                                                            teclado: a.teclado,
                                                            microfono:
                                                                a.microfono,
                                                            parlantes:
                                                                a.parlantes,
                                                            factura_relacionada:
                                                                a.factura_relacionada,
                                                        },
                                                    });
                                                case 10:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })();
                    Object(n.useEffect)(
                        function () {
                            I &&
                                (console.log("RECARGANDO ORDENES."),
                                ue(),
                                P(!1));
                        },
                        [I, U]
                    );
                    var ue = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2), y.get(jr)
                                                    );
                                                case 2:
                                                    (a = e.sent),
                                                        c(a.data),
                                                        u(a.data);
                                                case 5:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        me = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(Cr, a)
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        console.log(t),
                                                        e.abrupt("return", {
                                                            code: 200,
                                                            mensaje:
                                                                "Guardado OK",
                                                        })
                                                    );
                                                case 5:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        de = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    var a;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    if (
                                                        void 0 !==
                                                        (null === U ||
                                                        void 0 === U ||
                                                        null ===
                                                            (a = U.orden) ||
                                                        void 0 === a
                                                            ? void 0
                                                            : a.id)
                                                    ) {
                                                        e.next = 2;
                                                        break;
                                                    }
                                                    return e.abrupt("return");
                                                case 2:
                                                    Ke.a
                                                        .fire({
                                                            title: "\xbfEst\xe1 seguro de eliminar la orden?",
                                                            showDenyButton: !0,
                                                            confirmButtonText:
                                                                "si, borrar",
                                                            denyButtonText:
                                                                "Cancelar",
                                                        })
                                                        .then(
                                                            (function () {
                                                                var e = Object(
                                                                    j.a
                                                                )(
                                                                    O.a.mark(
                                                                        function e(
                                                                            a
                                                                        ) {
                                                                            return O.a.wrap(
                                                                                function (
                                                                                    e
                                                                                ) {
                                                                                    for (;;)
                                                                                        switch (
                                                                                            (e.prev =
                                                                                                e.next)
                                                                                        ) {
                                                                                            case 0:
                                                                                                if (
                                                                                                    !a.isConfirmed
                                                                                                ) {
                                                                                                    e.next = 12;
                                                                                                    break;
                                                                                                }
                                                                                                return (
                                                                                                    (e.next = 3),
                                                                                                    y.patch(
                                                                                                        wr +
                                                                                                            "/" +
                                                                                                            U
                                                                                                                .orden
                                                                                                                .id,
                                                                                                        {
                                                                                                            estado: 0,
                                                                                                        }
                                                                                                    )
                                                                                                );
                                                                                            case 3:
                                                                                                if (
                                                                                                    1 !==
                                                                                                    e
                                                                                                        .sent
                                                                                                        .data
                                                                                                ) {
                                                                                                    e.next = 12;
                                                                                                    break;
                                                                                                }
                                                                                                if (
                                                                                                    !(
                                                                                                        U
                                                                                                            .orden
                                                                                                            .factura_relacionada >
                                                                                                        0
                                                                                                    )
                                                                                                ) {
                                                                                                    e.next = 9;
                                                                                                    break;
                                                                                                }
                                                                                                return (
                                                                                                    (e.next = 8),
                                                                                                    B(
                                                                                                        U
                                                                                                            .orden
                                                                                                            .factura_relacionada
                                                                                                    )
                                                                                                );
                                                                                            case 8:
                                                                                                e.sent;
                                                                                            case 9:
                                                                                                P(
                                                                                                    !0
                                                                                                ),
                                                                                                    R(
                                                                                                        !0
                                                                                                    ),
                                                                                                    Ke.a.fire(
                                                                                                        "Eliminado",
                                                                                                        "",
                                                                                                        "success"
                                                                                                    );
                                                                                            case 12:
                                                                                            case "end":
                                                                                                return e.stop();
                                                                                        }
                                                                                },
                                                                                e
                                                                            );
                                                                        }
                                                                    )
                                                                );
                                                                return function (
                                                                    a
                                                                ) {
                                                                    return e.apply(
                                                                        this,
                                                                        arguments
                                                                    );
                                                                };
                                                            })()
                                                        );
                                                case 3:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })(),
                        pe = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.patch(
                                                            ""
                                                                .concat(yr, "/")
                                                                .concat(a.id),
                                                            a
                                                        )
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        e.abrupt("return", {
                                                            code: 200,
                                                            mensaje:
                                                                "Actualizado",
                                                            payload: t.data,
                                                        })
                                                    );
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        ge = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a) {
                                    var t;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.patch(
                                                            ""
                                                                .concat(yr, "/")
                                                                .concat(a.id),
                                                            a
                                                        )
                                                    );
                                                case 2:
                                                    return (
                                                        (t = e.sent),
                                                        e.abrupt("return", {
                                                            code: 200,
                                                            mensaje:
                                                                "Actualizado",
                                                            payload: t.data,
                                                        })
                                                    );
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        be = Object(n.useRef)(),
                        fe = Object(Wt.useReactToPrint)({
                            content: function () {
                                return be.current;
                            },
                        });
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            "div",
                            { style: { display: "none" } },
                            r.a.createElement(xr, {
                                datos: "mychael datos",
                                datosImpresion: U,
                                ref: be,
                            })
                        ),
                        r.a.createElement(
                            Or.Provider,
                            {
                                value: {
                                    ordenes: l,
                                    ordenesTemp: s,
                                    setOrdenes: c,
                                    setOrdenesTemp: u,
                                    setReload: P,
                                    isNew: p,
                                    setIsNew: g,
                                    guardarOrden: me,
                                    actualizarIngreso: pe,
                                    abonarIngreso: ge,
                                    currentIngreso: M,
                                    setCurrentIngreso: V,
                                    PrepararDatosImpresion: se,
                                    EventoImprimirReact: function () {
                                        fe();
                                    },
                                    componentRef: be,
                                    state: le,
                                    setState: ce,
                                    isOpenModalIngreso: G,
                                    SetIsOpenModalIngreso: H,
                                    guardarAbono: oe,
                                    isLoading: ae,
                                    setIsLoading: te,
                                    eliminarOrden: de,
                                    isOpenModalTotal: J,
                                    SetIsOpenModalTotal: Z,
                                    actualizarTotal: ie,
                                    openModalIngreso: w,
                                    setOpenModalIngreso: S,
                                    datosImpresion: U,
                                    definirFactura: E,
                                    setDefinirFactura: v,
                                },
                            },
                            e.children
                        )
                    );
                },
                Ir = t(404),
                Pr = t(137),
                Tr = t(609);
            function Fr() {
                var e = Object(n.useContext)(Or),
                    a = e.state,
                    t = e.setState,
                    l = function (e) {
                        t(
                            Object(Te.a)(
                                Object(Te.a)({}, a),
                                {},
                                Object(v.a)({}, e.target.name, e.target.checked)
                            )
                        );
                    };
                return r.a.createElement(
                    Pr.a,
                    { component: "fieldset", style: { marginLeft: "65px" } },
                    r.a.createElement(
                        Ir.a,
                        { component: "legend" },
                        "Estado del equipo"
                    ),
                    r.a.createElement(
                        Tr.a,
                        null,
                        r.a.createElement(
                            fe.a,
                            {
                                component: "label",
                                container: !0,
                                alignItems: "center",
                                spacing: 1,
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        checked: a.camara,
                                        onChange: l,
                                        name: "camara",
                                    }),
                                    label: "C\xe1mara",
                                })
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        checked: a.teclado,
                                        onChange: l,
                                        name: "teclado",
                                    }),
                                    label: "Teclado",
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                component: "label",
                                container: !0,
                                alignItems: "center",
                                spacing: 1,
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        checked: a.microfono,
                                        onChange: l,
                                        name: "microfono",
                                    }),
                                    label: "Microfono",
                                })
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        checked: a.parlantes,
                                        onChange: l,
                                        name: "parlantes",
                                    }),
                                    label: "Parlantes",
                                })
                            )
                        )
                    )
                );
            }
            var _r = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(3),
                    },
                    paper: {
                        padding: e.spacing(1),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            function Ar() {
                var e = Object(n.useContext)(ra).currentCliente,
                    a = Object(n.useContext)(Ut),
                    t = a.credito,
                    l = a.setCredito,
                    c = _r(),
                    o = new Date(),
                    i =
                        o.getFullYear() +
                        "-" +
                        (o.getMonth() + 1) +
                        "-" +
                        o.getDate();
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(
                        T.a,
                        { variant: "subtitle1", gutterBottom: !0 },
                        "Facturaci\xf3n"
                    ),
                    r.a.createElement(It.a, {
                        style: { float: "right", marginTop: "-40px" },
                        control: r.a.createElement(Kt.a, {
                            checked: t,
                            onChange: function (e) {
                                l(e.target.checked);
                            },
                            name: "credito",
                            color: "primary",
                        }),
                        label: " \xbfEs cr\xe9dito?",
                    }),
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            style: { fontSize: "12px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 6 },
                            r.a.createElement(Xt, { concatenarCedula: !0 })
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 6 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                r.a.createElement("strong", null, "Fecha:"),
                                " ",
                                i,
                                r.a.createElement("br", null),
                                r.a.createElement("strong", null, "CI. :"),
                                " ",
                                e.cedula,
                                r.a.createElement("br", null),
                                r.a.createElement("strong", null, "Telf. :"),
                                " ",
                                e.telefono
                            )
                        )
                    ),
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            style: { fontSize: "12px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(Bt.a, { className: c.paper }, "*")
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Cant."
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 5 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Nombre producto"
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Precio U."
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: c.paper },
                                "Total"
                            )
                        )
                    )
                );
            }
            var Rr = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(3),
                    },
                    paper: {
                        padding: e.spacing(1),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            var Br = function (e) {
                return (function (e) {
                    var a =
                            arguments.length > 1 && void 0 !== arguments[1]
                                ? arguments[1]
                                : 0,
                        t = e.toString(),
                        n = (t.length, t.indexOf(".") + 1),
                        r = t.substr(0, n + a);
                    return Number(r);
                })(e / 1.12, 4);
            };
            function Dr(e) {
                var a = e.producto,
                    t = Rr(),
                    l = Object(n.useContext)(Ut),
                    c =
                        (l.sumarStockProductoFactura,
                        l.sumarStockProductoFacturaCantidad,
                        l.restarStockProductoFactura,
                        l.eliminarProductoFactura),
                    o = (l.numeroItems, l.SetNumeroItems),
                    i = l.actualizarStockProductosCantidad,
                    s = (l.productos, l.productosFactura),
                    u = l.calcularTotalesFactura,
                    m = l.actualizarProductosFactura,
                    d = Object(n.useState)(1),
                    p = Object(h.a)(d, 2),
                    g = p[0],
                    b = p[1],
                    f = function (e, a) {
                        var t = 0;
                        s.map(function (a) {
                            e.tipoPrecio !== a.tipoPrecio &&
                                (t = parseInt(t) + parseInt(a.cantidad));
                        }),
                            (t = parseInt(t) + parseInt(a)),
                            m(e, a),
                            i(e, t),
                            u(s);
                    };
                return r.a.createElement(
                    "div",
                    { style: { height: "24px" }, key: a.id + a.tipoPrecio },
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            margin: 0,
                            style: { fontSize: "11px" },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                r.a.createElement(en.a, {
                                    style: { cursor: "pointer" },
                                    onClick: function () {
                                        return (function (e) {
                                            var a = 0;
                                            s.map(function (t) {
                                                e.tipoPrecio !== t.tipoPrecio &&
                                                    (a =
                                                        parseInt(a) +
                                                        parseInt(t.cantidad));
                                            }),
                                                c(e, a);
                                        })(a);
                                    },
                                    color: "action",
                                    fontSize: "inherit",
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                r.a.createElement("input", {
                                    type: "text",
                                    onBlur: function (e) {
                                        return f(a, e.target.value);
                                    },
                                    onChange: function (e) {
                                        return (function (e, a, t) {
                                            a.target.validity.valid &&
                                                (0 != e
                                                    ? e > t.stock
                                                        ? ea.a.error(
                                                              "La cantidad supera el Stock del producto",
                                                              2
                                                          )
                                                        : (b(e), f(t, e), o(e))
                                                    : ea.a.error(
                                                          "La cantidad no puede ser 0",
                                                          2
                                                      ));
                                        })(e.target.value, e, a);
                                    },
                                    value: g,
                                    pattern: "[0-9]{0,13}",
                                    style: {
                                        width: "70px",
                                        height: "14px",
                                        fontSize: "10px",
                                        textAlign: "center",
                                    },
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 5, title: a.nombre },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                a.nombre
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                item: !0,
                                xs: 2,
                                style: { backgroundColor: "#cef2e6" },
                            },
                            r.a.createElement(
                                Bt.a,
                                {
                                    style: { backgroundColor: "#cef2e6" },
                                    className: t.paper,
                                },
                                "publico" === a.tipoPrecio
                                    ? Br(a.precio_publico)
                                    : "",
                                "tecnico" === a.tipoPrecio
                                    ? Br(a.precio_tecnico)
                                    : "",
                                "mayorista" === a.tipoPrecio
                                    ? Br(a.precio_distribuidor)
                                    : ""
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.total
                            )
                        )
                    )
                );
            }
            var Lr = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(0),
                        fontSize: "12px",
                    },
                    paper: {
                        padding: e.spacing(1),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    paperRight: {
                        padding: e.spacing(1),
                        textAlign: "Right",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            function Mr(e) {
                var a = e.totales,
                    t = Lr(),
                    l = Object(n.useContext)(Ut),
                    c = l.observacion,
                    o = l.setObservacion;
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(F.a, { className: t.divider }),
                    r.a.createElement(
                        "div",
                        { className: t.container },
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "IVA 12%: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.iva
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "TOTAL: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paper,
                                    style: {
                                        fontWeight: "bold",
                                        fontSize: "14px",
                                    },
                                },
                                "$ ",
                                a.total
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 9" } },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paperRight,
                                    style: { textAlign: "left" },
                                },
                                r.a.createElement(rn.a, {
                                    defaultValue: c,
                                    onChange: function (e) {
                                        o(e.target.value);
                                    },
                                    style: { width: "100%" },
                                    "aria-label": "minimum height",
                                    rows: 3,
                                    placeholder: "Observaciones",
                                })
                            )
                        ),
                        r.a.createElement("div", {
                            style: {
                                gridColumnEnd: "span 3",
                                textAlign: "center",
                            },
                        })
                    )
                );
            }
            var Vr = function () {
                    var e = Object(n.useContext)(Ut),
                        a = e.productosFactura,
                        t = e.totales;
                    return r.a.createElement(
                        "div",
                        null,
                        r.a.createElement(Ar, null),
                        r.a.createElement(
                            "div",
                            { style: { height: "130px", overflow: "auto" } },
                            a.map(function (e) {
                                return r.a.createElement(Dr, {
                                    key: e.id + e.tipoPrecio,
                                    producto: e,
                                });
                            })
                        ),
                        r.a.createElement(Mr, { key: 1, totales: t })
                    );
                },
                zr =
                    (t(610),
                    Object(u.a)(function (e) {
                        return {
                            root: {
                                flexGrow: 1,
                                overflow: "hidden",
                                padding: e.spacing(0, 3),
                            },
                            paper: {
                                maxWidth: "100%",
                                margin: "".concat(e.spacing(1), "px auto"),
                                padding: e.spacing(1),
                            },
                        };
                    })),
                Wr = function (e) {
                    e.classes;
                    var a = e.productos,
                        t = zr(),
                        l = Object(n.useContext)(Ut).agregarProductoFactura;
                    return r.a.createElement(
                        "div",
                        { style: { height: "370px", overflow: "auto" } },
                        a.map(function (e) {
                            if (e.stock > 0)
                                return r.a.createElement(
                                    "div",
                                    { key: e.id },
                                    r.a.createElement(
                                        Bt.a,
                                        {
                                            id: "productoTabla",
                                            style: {
                                                cursor: "pointer",
                                                fontSize: "12px",
                                                fontFamily: "Roboto",
                                                textAlign: "justify",
                                            },
                                            className: t.paper,
                                            onClick: function () {
                                                return (function (e) {
                                                    l(e);
                                                })(e);
                                            },
                                        },
                                        r.a.createElement(
                                            fe.a,
                                            {
                                                container: !0,
                                                wrap: "nowrap",
                                                spacing: 1,
                                            },
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0 },
                                                r.a.createElement(
                                                    P.a,
                                                    {
                                                        title:
                                                            "Stock " + e.stock,
                                                    },
                                                    e.stock
                                                )
                                            ),
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0, xs: !0 },
                                                r.a.createElement(
                                                    "strong",
                                                    {
                                                        style: {
                                                            color: "#3f51b5",
                                                        },
                                                    },
                                                    e.nombre
                                                ),
                                                r.a.createElement("br", null),
                                                e.descripcion
                                            ),
                                            r.a.createElement(
                                                fe.a,
                                                { item: !0, xs: 3 },
                                                "P. P\xfablico $",
                                                e.precio_publico,
                                                r.a.createElement("br", null),
                                                "P. T\xe9cnico $",
                                                e.precio_tecnico,
                                                r.a.createElement("br", null),
                                                "P. Mayorista $",
                                                e.precio_distribuidor
                                            )
                                        ),
                                        r.a.createElement(
                                            fe.a,
                                            {
                                                item: !0,
                                                xs: 12,
                                                style: { fontSize: "9px" },
                                            },
                                            "Cod: ",
                                            e.codigo_barra
                                        )
                                    )
                                );
                        })
                    );
                },
                Ur = function (e) {
                    var a = e.classes,
                        t = Object(n.useContext)(pt),
                        l = t.setProductosTemp,
                        c = t.productos;
                    return r.a.createElement(
                        Bt.a,
                        { className: a.paper },
                        r.a.createElement(_e.a, {
                            fullWidth: !0,
                            onChange: function (e) {
                                var a = c.filter(function (a) {
                                    var t = a.nombre.toUpperCase(),
                                        n = e.target.value.toUpperCase(),
                                        r =
                                            null === a.codigo_barra
                                                ? "".toString()
                                                : a.codigo_barra.toString(),
                                        l = e.target.value.toString();
                                    return (
                                        t.indexOf(n) > -1 || r.indexOf(l) > -1
                                    );
                                });
                                l(a);
                            },
                            InputProps: {
                                startAdornment: r.a.createElement(
                                    Je.a,
                                    { position: "start" },
                                    r.a.createElement(
                                        Ze.a,
                                        {
                                            fontSize: "inherit",
                                            color: "action",
                                        },
                                        r.a.createElement(ca.a, null)
                                    )
                                ),
                            },
                            placeholder: "Buscar Producto",
                            variant: "outlined",
                        })
                    );
                },
                qr = function (e) {
                    var a = e.classes,
                        t = e.productos,
                        n = e.setProductos,
                        l = e.buscarProductos;
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(Ur, {
                            buscarProductos: l,
                            productos: t,
                            classes: a,
                            setProductos: n,
                        }),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 12 },
                            r.a.createElement(
                                Bt.a,
                                { className: a.paper },
                                r.a.createElement(
                                    "strong",
                                    null,
                                    "Seleccione Productos"
                                ),
                                r.a.createElement(_n, null)
                            )
                        ),
                        r.a.createElement(Wr, { productos: t, classes: a })
                    );
                },
                $r = Object(u.a)(function (e) {
                    return {
                        root: { flexGrow: 1 },
                        margin: { margin: e.spacing(1) },
                        paper: {
                            padding: e.spacing(2),
                            textAlign: "center",
                            color: e.palette.text.secondary,
                        },
                        paper2: {
                            padding: e.spacing(1),
                            textAlign: "left",
                            color: e.palette.text.secondary,
                            height: "35px",
                        },
                    };
                }),
                Yr = function () {
                    var e = $r(),
                        a = Object(n.useContext)(pt),
                        t = a.ObtenerProductos,
                        l = (a.productos, a.setProductos),
                        c = a.buscarProductos,
                        o = a.productosTemp;
                    Object(n.useContext)(ra).setCurrentCliente;
                    return (
                        r.a.useEffect(function () {
                            t();
                        }, []),
                        r.a.createElement(
                            "div",
                            { className: e.root },
                            r.a.createElement(
                                fe.a,
                                { container: !0, spacing: 1 },
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12 },
                                    r.a.createElement(
                                        Bt.a,
                                        { className: e.paper },
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            "Punto de venta"
                                        )
                                    )
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12, sm: 5 },
                                    r.a.createElement(qr, {
                                        setProductos: l,
                                        buscarProductos: c,
                                        productos: o,
                                        classes: e,
                                    })
                                ),
                                r.a.createElement(
                                    fe.a,
                                    { item: !0, xs: 12, sm: 7 },
                                    r.a.createElement(
                                        Bt.a,
                                        { className: e.paper },
                                        r.a.createElement(Vr, null)
                                    )
                                )
                            )
                        )
                    );
                },
                Gr = Object(u.a)(function (e) {
                    return {
                        form: {
                            display: "flex",
                            flexDirection: "column",
                            margin: "auto",
                            width: "fit-content",
                        },
                        formControl: { marginTop: e.spacing(2), minWidth: 120 },
                        formControlLabel: { marginTop: e.spacing(1) },
                    };
                });
            function Hr(e) {
                var a = e.IsguardarFactura,
                    t = void 0 !== a && a,
                    l = Gr(),
                    c = r.a.useState(!1),
                    o = Object(h.a)(c, 2),
                    i = o[0],
                    s = o[1],
                    u = r.a.useState(!0),
                    m = Object(h.a)(u, 2),
                    d = m[0],
                    p = (m[1], r.a.useState("lg")),
                    g = Object(h.a)(p, 2),
                    b = g[0],
                    f = (g[1], Object(n.useContext)(Ut)),
                    E = f.guardarFactura,
                    v = f.totales,
                    x = f.setProductosFactura,
                    C = f.setCredito,
                    y = r.a.useContext(Or),
                    w = y.actualizarIngreso,
                    S = y.setReload,
                    k = Object(n.useContext)(ra),
                    N = k.setCurrentCliente,
                    I =
                        (k.currentCliente,
                        Object(n.useContext)(da).setIsReload),
                    P = Object(n.useRef)(),
                    T = Object(Wt.useReactToPrint)({
                        content: function () {
                            return P.current;
                        },
                        onAfterPrint: function () {
                            x([]),
                                C(!1),
                                N({ cedula: "", nombres: "-SELECCIONE-" });
                        },
                    }),
                    F = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                s(!1);
                                            case 1:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })(),
                    _ = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a, n, r, l;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                if (!t) {
                                                    e.next = 20;
                                                    break;
                                                }
                                                return (
                                                    (a = -1), (e.next = 4), E()
                                                );
                                            case 4:
                                                if (
                                                    500 !== (n = e.sent).status
                                                ) {
                                                    e.next = 8;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "[ERROR EN FACTURA] " +
                                                            n.mensaje,
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 8:
                                                if ((T(), 200 != n.status)) {
                                                    e.next = 20;
                                                    break;
                                                }
                                                return (
                                                    (a = n.codigoFac),
                                                    (r = {
                                                        id: localStorage.getItem(
                                                            "idIngreso"
                                                        ),
                                                        factura_relacionada: a,
                                                        total: v.total,
                                                    }),
                                                    (e.next = 14),
                                                    w(r)
                                                );
                                            case 14:
                                                if (200 === (l = e.sent).code) {
                                                    e.next = 18;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(l.mensaje, 2),
                                                    e.abrupt("return")
                                                );
                                            case 18:
                                                S(!0), I(!0);
                                            case 20:
                                                s(!1);
                                            case 21:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        "div",
                        { style: { display: "none" } },
                        r.a.createElement(vn, { ref: P })
                    ),
                    r.a.createElement(
                        Y.a,
                        {
                            variant: "outlined",
                            color: "primary",
                            onClick: function () {
                                s(!0);
                            },
                        },
                        "Definir Factura"
                    ),
                    r.a.createElement(
                        Vn.a,
                        {
                            fullWidth: d,
                            maxWidth: b,
                            open: i,
                            onClose: _,
                            "aria-labelledby": "max-width-dialog-title",
                        },
                        r.a.createElement(
                            qn.a,
                            { id: "max-width-dialog-title" },
                            "Ingresar Factura"
                        ),
                        r.a.createElement(
                            Wn.a,
                            null,
                            r.a.createElement(
                                "form",
                                { className: l.form, noValidate: !0 },
                                r.a.createElement(
                                    Pr.a,
                                    { className: l.formControl },
                                    r.a.createElement(Yr, null)
                                )
                            )
                        ),
                        r.a.createElement(
                            zn.a,
                            null,
                            r.a.createElement(
                                Y.a,
                                { onClick: F, color: "primary" },
                                "Cancelar"
                            ),
                            r.a.createElement(
                                Y.a,
                                { onClick: _, color: "primary" },
                                t ? "Guardar" : "Aceptar"
                            )
                        )
                    )
                );
            }
            var Xr = Object(u.a)(function (e) {
                return {
                    root: {
                        display: "flex",
                        "& > * + *": { marginLeft: e.spacing(2) },
                    },
                };
            });
            function Kr() {
                var e = Xr();
                return r.a.createElement(
                    "div",
                    { className: e.root },
                    r.a.createElement(va.a, null)
                );
            }
            var Jr = Object(u.a)(function (e) {
                return {
                    root: { display: "flex", flexWrap: "wrap" },
                    textField1: {
                        marginLeft: e.spacing(1),
                        marginRight: e.spacing(1),
                        width: "36ch",
                    },
                    textField: {
                        marginLeft: e.spacing(1),
                        marginRight: e.spacing(1),
                        width: "25ch",
                    },
                    textFieldFecha: {
                        marginLeft: e.spacing(1),
                        marginRight: e.spacing(5),
                        marginBottom: e.spacing(2),
                        width: "27ch",
                    },
                    btn: {
                        marginLeft: e.spacing(1),
                        marginRight: e.spacing(1),
                    },
                };
            });
            function Zr() {
                var e = Jr(),
                    a = new Date(),
                    t = Object(n.useState)(!1),
                    l = Object(h.a)(t, 2),
                    c = l[0],
                    o = l[1],
                    i = Object(n.useState)(
                        zt.a.format(a, "YYYY-MM-DD HH:mm:ss")
                    ),
                    s = Object(h.a)(i, 2),
                    u = s[0],
                    m = s[1],
                    d = Object(n.useContext)(Ut),
                    p = d.guardarFactura,
                    g = d.totales,
                    b = d.setProductosFactura,
                    f = d.setCredito,
                    E = Object(n.useContext)(ra),
                    x = E.setCurrentCliente,
                    C = E.currentCliente,
                    y =
                        (Object(n.useContext)(fr).currentTecnico,
                        Object(n.useContext)(da).setIsReload),
                    w = Object(n.useContext)(Or),
                    S = w.guardarOrden,
                    k = w.setIsNew,
                    N = w.setReload,
                    P = w.state,
                    T = Object(n.useRef)(),
                    F = Object(Wt.useReactToPrint)({
                        content: function () {
                            return T.current;
                        },
                        onAfterPrint: function () {
                            b([]),
                                f(!1),
                                x({ cedula: "", nombres: "-SELECCIONE-" });
                        },
                    }),
                    _ = Object(n.useState)(""),
                    A = Object(h.a)(_, 2),
                    R = A[0],
                    B = A[1],
                    D = Object(n.useState)(""),
                    L = Object(h.a)(D, 2),
                    M = L[0],
                    V = L[1],
                    z = Object(n.useState)(""),
                    W = Object(h.a)(z, 2),
                    U = W[0],
                    q = W[1],
                    $ = Object(n.useState)(""),
                    G = Object(h.a)($, 2),
                    H = G[0],
                    X = G[1],
                    K = Object(n.useState)(""),
                    J = Object(h.a)(K, 2),
                    Z = J[0],
                    Q = J[1],
                    ee = Object(n.useState)(""),
                    ae = Object(h.a)(ee, 2),
                    te = ae[0],
                    ne = ae[1],
                    re = Object(n.useState)(0),
                    le = Object(h.a)(re, 2),
                    ce = (le[0], le[1], Object(n.useState)(0)),
                    oe = Object(h.a)(ce, 2),
                    ie = oe[0],
                    se = (oe[1], Object(n.useState)(0)),
                    ue = Object(h.a)(se, 2),
                    me = ue[0],
                    de = (ue[1], Object(n.useState)("")),
                    pe = Object(h.a)(de, 2),
                    ge = pe[0],
                    be = pe[1];
                Object(n.useEffect)(
                    function () {
                        console.log("redner nuevo"),
                            x({ cedula: "", nombres: "-SELECCIONE-" });
                    },
                    [ie]
                );
                var fe = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a, t, n, r, l, c, i, s;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                if ((a = Ee()).estado) {
                                                    e.next = 4;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(a.mensaje, 2),
                                                    e.abrupt("return")
                                                );
                                            case 4:
                                                if (
                                                    (o(!0),
                                                    (t = []),
                                                    0 !== me &&
                                                        ([],
                                                        (t = [
                                                            {
                                                                abono: me,
                                                                fecha: u,
                                                                comentario:
                                                                    "Abono inicial",
                                                            },
                                                        ])),
                                                    (n = 1),
                                                    null !==
                                                        localStorage.getItem(
                                                            "user_id"
                                                        ) &&
                                                        (n =
                                                            localStorage.getItem(
                                                                "user_id"
                                                            )),
                                                    (r = -1),
                                                    (l = 0),
                                                    !xe.checked_facturarIngreso)
                                                ) {
                                                    e.next = 22;
                                                    break;
                                                }
                                                return (
                                                    (l = g.total),
                                                    (e.next = 15),
                                                    p()
                                                );
                                            case 15:
                                                if (
                                                    500 !== (c = e.sent).status
                                                ) {
                                                    e.next = 20;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "[ERROR EN FACTURA] " +
                                                            c.mensaje,
                                                        2
                                                    ),
                                                    o(!1),
                                                    e.abrupt("return")
                                                );
                                            case 20:
                                                F(),
                                                    200 == c.status &&
                                                        (r = c.codigoFac);
                                            case 22:
                                                return (
                                                    (i = {
                                                        cliente_id: C.id,
                                                        usuario_id: n,
                                                        fecha: u,
                                                        equipo: R,
                                                        marca: M,
                                                        modelo: U,
                                                        serie: H,
                                                        falla: Z,
                                                        trabajo: te,
                                                        total: l,
                                                        saldo: ie,
                                                        abono: me,
                                                        observacion: ge,
                                                        camara: P.camara,
                                                        teclado: P.teclado,
                                                        microfono: P.microfono,
                                                        parlantes: P.parlantes,
                                                        last_user_update: n,
                                                        user_update_work: n,
                                                        abono_ordenes: t,
                                                        factura_relacionada: r,
                                                    }),
                                                    (e.next = 25),
                                                    S(i)
                                                );
                                            case 25:
                                                if (200 === (s = e.sent).code) {
                                                    e.next = 30;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(s.mensaje, 2),
                                                    o(!1),
                                                    e.abrupt("return")
                                                );
                                            case 30:
                                                ea.a.success(s.mensaje, 2),
                                                    y(!0),
                                                    N(!0),
                                                    k(!1),
                                                    o(!1);
                                            case 35:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })(),
                    Ee = function () {
                        return "" === R
                            ? { estado: !1, mensaje: "Ingrese el equipo" }
                            : "" === M
                            ? { estado: !1, mensaje: "Ingrese la marca" }
                            : "" === U
                            ? { estado: !1, mensaje: "Ingrese el modelo" }
                            : "" === H
                            ? { estado: !1, mensaje: "Ingrese la serie" }
                            : "" === Z
                            ? { estado: !1, mensaje: "Ingrese la falla" }
                            : void 0 === C.id
                            ? { estado: !1, mensaje: "Seleccione el cliente" }
                            : { estado: !0, mensaje: "OK" };
                    },
                    he = r.a.useState({ checked_facturarIngreso: !1 }),
                    ve = Object(h.a)(he, 2),
                    xe = ve[0],
                    Oe = ve[1];
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        "div",
                        { className: e.root },
                        r.a.createElement(
                            "div",
                            { style: { display: "none" } },
                            r.a.createElement(vn, { ref: T })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement("div", null),
                            r.a.createElement(It.a, {
                                control: r.a.createElement(Kt.a, {
                                    checked: xe.checked_facturarIngreso,
                                    onChange: function (e) {
                                        Oe(
                                            Object(Te.a)(
                                                Object(Te.a)({}, xe),
                                                {},
                                                Object(v.a)(
                                                    {},
                                                    e.target.name,
                                                    e.target.checked
                                                )
                                            )
                                        );
                                    },
                                    name: "checked_facturarIngreso",
                                    color: "primary",
                                }),
                                label: "Ingreso facturado",
                            }),
                            xe.checked_facturarIngreso &&
                                r.a.createElement(Hr, null),
                            r.a.createElement("br", null),
                            r.a.createElement("br", null),
                            r.a.createElement("div", null),
                            r.a.createElement(
                                "div",
                                { className: e.root },
                                r.a.createElement(_e.a, {
                                    id: "date",
                                    label: "Fecha Ingreso",
                                    type: "datetime-local",
                                    onChange: function (e) {
                                        return m(e.target.value);
                                    },
                                    defaultValue: u,
                                    className: e.textFieldFecha,
                                    InputLabelProps: { shrink: !0 },
                                }),
                                r.a.createElement(Xt, {
                                    ancho: 400,
                                    concatenarCedula: !0,
                                })
                            ),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Equipo",
                                id: "margin-none",
                                defaultValue: "",
                                onChange: function (e) {
                                    return B(e.target.value);
                                },
                                className: e.textField1,
                                helperText: "P. Ej. CPU",
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Marca",
                                id: "margin-none",
                                defaultValue: "",
                                onChange: function (e) {
                                    return V(e.target.value);
                                },
                                className: e.textField1,
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Modelo",
                                id: "margin-none",
                                defaultValue: "",
                                onChange: function (e) {
                                    return q(e.target.value);
                                },
                                className: e.textField1,
                                helperText: "",
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Serie",
                                id: "margin-none",
                                defaultValue: "",
                                onChange: function (e) {
                                    return X(e.target.value);
                                },
                                className: e.textField1,
                                helperText: "",
                            }),
                            r.a.createElement(Fr, null),
                            r.a.createElement(_e.a, {
                                id: "standard-full-width",
                                onChange: function (e) {
                                    return Q(e.target.value);
                                },
                                label: "Falla",
                                style: { margin: 8, width: "90%" },
                                placeholder: "",
                                multiline: !0,
                                helperText: "P. Ej. No enciende",
                                margin: "normal",
                                InputLabelProps: { shrink: !0 },
                            }),
                            r.a.createElement(_e.a, {
                                id: "standard-full-width",
                                onChange: function (e) {
                                    return ne(e.target.value);
                                },
                                label: "Trabajo",
                                style: { margin: 8, width: "90%" },
                                placeholder: "",
                                multiline: !0,
                                helperText: "P. Ej. Se repar\xf3 circuito",
                                margin: "normal",
                                InputLabelProps: { shrink: !0 },
                            })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                id: "filled-full-width",
                                label: "Observaci\xf3n",
                                style: {
                                    margin: "3px 10px 3px 3px",
                                    width: "425px",
                                },
                                placeholder: "",
                                helperText: "",
                                fullWidth: !0,
                                margin: "normal",
                                onChange: function (e) {
                                    return be(e.target.value);
                                },
                                InputLabelProps: { shrink: !0 },
                                variant: "filled",
                            })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                disabled: !0,
                                id: "standard-disabled",
                                label: "Usuario",
                                value: localStorage.getItem("nombres"),
                            })
                        )
                    ),
                    r.a.createElement(
                        I.a,
                        { display: "flex", justifyContent: "flex-end" },
                        c && r.a.createElement(Kr, null),
                        r.a.createElement(
                            Y.a,
                            {
                                variant: "contained",
                                className: e.btn,
                                onClick: function () {
                                    k(!1);
                                },
                            },
                            "Cancelar"
                        ),
                        r.a.createElement(
                            Y.a,
                            {
                                disabled: !!c,
                                color: "primary",
                                variant: "contained",
                                onClick: fe,
                            },
                            "Guardar"
                        )
                    )
                );
            }
            var Qr = t(110),
                el = t.n(Qr),
                al = t(426),
                tl = t.n(al),
                nl = Object(u.a)(function (e) {
                    return {
                        root: {},
                        importButton: { marginRight: e.spacing(1) },
                        exportButton: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                }),
                rl = function (e) {
                    var a = e.filrarIngresos;
                    return r.a.createElement(
                        je.a,
                        null,
                        r.a.createElement(
                            I.a,
                            { maxWidth: 500 },
                            r.a.createElement(_e.a, {
                                fullWidth: !0,
                                onChange: a,
                                InputProps: {
                                    startAdornment: r.a.createElement(
                                        Je.a,
                                        { position: "start" },
                                        r.a.createElement(
                                            Ze.a,
                                            {
                                                fontSize: "small",
                                                color: "action",
                                            },
                                            r.a.createElement(ca.a, null)
                                        )
                                    ),
                                },
                                placeholder: "Buscar ingreso",
                                variant: "outlined",
                            })
                        )
                    );
                },
                ll = function (e) {
                    var a = e.className,
                        t = Object(U.a)(e, ["className"]),
                        l = nl(),
                        c = Object(n.useState)({
                            imprimir: !1,
                            eliminar: !1,
                            nuevoIngreso: !1,
                        }),
                        o = Object(h.a)(c, 2),
                        i = o[0],
                        s = o[1],
                        u = Object(n.useContext)(Or),
                        m = u.setOrdenesTemp,
                        d = u.ordenes,
                        p = u.isNew,
                        g = u.setIsNew,
                        b = u.datosImpresion,
                        f = u.EventoImprimirReact,
                        E = u.eliminarOrden,
                        v = u.definirFactura,
                        x = u.setOpenModalIngreso;
                    return (
                        Object(n.useEffect)(
                            function () {
                                console.log("COMPONENTE", b),
                                    null !==
                                        localStorage.getItem("tipo_usuario") &&
                                        ("ATENCION AL PUBLICO" ===
                                            localStorage.getItem(
                                                "tipo_usuario"
                                            ) &&
                                            s(
                                                Object(Te.a)(
                                                    Object(Te.a)({}, i),
                                                    {},
                                                    { eliminar: !0 }
                                                )
                                            ),
                                        "TECNICO" ===
                                            localStorage.getItem(
                                                "tipo_usuario"
                                            ) &&
                                            s(
                                                Object(Te.a)(
                                                    Object(Te.a)({}, i),
                                                    {},
                                                    {
                                                        imprimir: !0,
                                                        eliminar: !0,
                                                        nuevoIngreso: !0,
                                                    }
                                                )
                                            ));
                            },
                            [b]
                        ),
                        r.a.createElement(
                            "div",
                            Object.assign(
                                { className: Object(q.a)(l.root, a) },
                                t
                            ),
                            r.a.createElement(
                                I.a,
                                { display: "flex", justifyContent: "flex-end" },
                                p
                                    ? null
                                    : v
                                    ? r.a.createElement(Hr, {
                                          IsguardarFactura: !0,
                                      })
                                    : null,
                                p
                                    ? null
                                    : r.a.createElement(
                                          Y.a,
                                          {
                                              variant: "contained",
                                              color: "secondary",
                                              className: l.exportButton,
                                              startIcon: r.a.createElement(
                                                  tl.a,
                                                  null
                                              ),
                                              title: "Ver/Editar Ingreso",
                                              onClick: function () {
                                                  x(!0);
                                              },
                                          },
                                          "Ver"
                                      ),
                                p
                                    ? null
                                    : r.a.createElement(
                                          Y.a,
                                          {
                                              variant: "contained",
                                              color: "secondary",
                                              className: l.exportButton,
                                              startIcon: r.a.createElement(
                                                  el.a,
                                                  null
                                              ),
                                              onClick: f,
                                              disabled: i.imprimir,
                                          },
                                          "Imprimir"
                                      ),
                                p
                                    ? null
                                    : r.a.createElement(
                                          Y.a,
                                          {
                                              variant: "contained",
                                              style: {
                                                  backgroundColor:
                                                      "rgb(154, 0, 54)",
                                              },
                                              color: "secondary",
                                              className: l.exportButton,
                                              disabled: i.eliminar,
                                              onClick: E,
                                              startIcon: r.a.createElement(
                                                  He.a,
                                                  null
                                              ),
                                          },
                                          "Eliminar"
                                      ),
                                p
                                    ? null
                                    : r.a.createElement(
                                          Y.a,
                                          {
                                              color: "primary",
                                              variant: "contained",
                                              onClick: function () {
                                                  g(!0);
                                              },
                                              disabled: i.nuevoIngreso,
                                          },
                                          "Nuevo Ingreso"
                                      )
                            ),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(
                                    Oe.a,
                                    null,
                                    p
                                        ? r.a.createElement(Zr, null)
                                        : r.a.createElement(rl, {
                                              filrarIngresos: function (e) {
                                                  var a = d.filter(function (
                                                      a
                                                  ) {
                                                      var t =
                                                              a.cliente.toUpperCase(),
                                                          n =
                                                              e.target.value.toUpperCase(),
                                                          r = a.id
                                                              .toString()
                                                              .toUpperCase(),
                                                          l = e.target.value
                                                              .toString()
                                                              .toUpperCase();
                                                      return (
                                                          t.indexOf(n) > -1 ||
                                                          r
                                                              .toString()
                                                              .indexOf(l) > -1
                                                      );
                                                  });
                                                  m(a);
                                              },
                                          })
                                )
                            )
                        )
                    );
                },
                cl =
                    (Object(u.a)(function (e) {
                        return {
                            root: { display: "flex", flexDirection: "column" },
                            statsItem: {
                                alignItems: "center",
                                display: "flex",
                            },
                            statsIcon: { marginRight: e.spacing(1) },
                        };
                    }),
                    [
                        {
                            field: "id",
                            headerName: "ID",
                            width: 90,
                            visible: !1,
                        },
                        {
                            field: "cliente",
                            headerName: "Cliente",
                            width: 300,
                            visible: !0,
                            editable: !1,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "fecha",
                            headerName: "Fecha",
                            width: 130,
                            editable: !0,
                        },
                        {
                            field: "observacion",
                            headerName: "Observaci\xf3n",
                            width: 315,
                            editable: !0,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "factura_relacionada",
                            headerName: "Fac.",
                            width: 115,
                            editable: !1,
                        },
                        {
                            field: "equipo",
                            headerName: "Equipo",
                            width: 200,
                            editable: !0,
                        },
                        {
                            field: "marca",
                            headerName: "Marca",
                            width: 140,
                            editable: !0,
                        },
                        {
                            field: "modelo",
                            headerName: "Modelo",
                            width: 160,
                            editable: !0,
                        },
                        {
                            field: "serie",
                            headerName: "Serie",
                            width: 200,
                            visible: !0,
                            editable: !1,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "falla",
                            headerName: "Falla",
                            width: 440,
                            editable: !0,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "trabajo",
                            headerName: "Trabajo",
                            width: 440,
                            editable: !0,
                            renderCell: function (e) {
                                return r.a.createElement(
                                    wa.a,
                                    { title: e.formattedValue },
                                    r.a.createElement(
                                        "span",
                                        { className: "table-cell-trucate" },
                                        e.formattedValue
                                    )
                                );
                            },
                        },
                        {
                            field: "update_work",
                            headerName: "Actualiz\xf3 trabajo",
                            width: 200,
                            editable: !1,
                        },
                    ]),
                ol = [
                    { field: "id", headerName: "ID", width: 90, visible: !1 },
                    {
                        field: "cliente",
                        headerName: "Cliente",
                        width: 300,
                        visible: !0,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "fecha",
                        headerName: "Fecha",
                        width: 130,
                        editable: !1,
                    },
                    {
                        field: "observacion",
                        headerName: "Observaci\xf3n",
                        width: 315,
                        editable: !0,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "factura_relacionada",
                        headerName: "Fac.",
                        width: 115,
                        editable: !1,
                    },
                    {
                        field: "equipo",
                        headerName: "Equipo",
                        width: 200,
                        editable: !1,
                    },
                    {
                        field: "marca",
                        headerName: "Marca",
                        width: 140,
                        editable: !1,
                    },
                    {
                        field: "modelo",
                        headerName: "Modelo",
                        width: 160,
                        editable: !1,
                    },
                    {
                        field: "serie",
                        headerName: "Serie",
                        width: 200,
                        visible: !0,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "falla",
                        headerName: "Falla",
                        width: 440,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "trabajo",
                        headerName: "Trabajo",
                        width: 440,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "update_work",
                        headerName: "Actualiz\xf3 trabajo",
                        width: 200,
                        editable: !1,
                    },
                ],
                il = [
                    { field: "id", headerName: "ID", width: 90, visible: !1 },
                    {
                        field: "cliente",
                        headerName: "Cliente",
                        width: 300,
                        visible: !0,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "fecha",
                        headerName: "Fecha",
                        width: 130,
                        editable: !1,
                    },
                    {
                        field: "observacion",
                        headerName: "Observaci\xf3n",
                        width: 315,
                        editable: !0,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "factura_relacionada",
                        headerName: "Fac.",
                        width: 115,
                        editable: !1,
                    },
                    {
                        field: "equipo",
                        headerName: "Equipo",
                        width: 200,
                        editable: !1,
                    },
                    {
                        field: "marca",
                        headerName: "Marca",
                        width: 140,
                        editable: !1,
                    },
                    {
                        field: "modelo",
                        headerName: "Modelo",
                        width: 160,
                        editable: !1,
                    },
                    {
                        field: "serie",
                        headerName: "Serie",
                        width: 200,
                        visible: !0,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "falla",
                        headerName: "Falla",
                        width: 440,
                        editable: !1,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "trabajo",
                        headerName: "Trabajo",
                        width: 440,
                        editable: !0,
                        renderCell: function (e) {
                            return r.a.createElement(
                                wa.a,
                                { title: e.formattedValue },
                                r.a.createElement(
                                    "span",
                                    { className: "table-cell-trucate" },
                                    e.formattedValue
                                )
                            );
                        },
                    },
                    {
                        field: "update_work",
                        headerName: "Actualiz\xf3 trabajo",
                        width: 200,
                        editable: !1,
                    },
                ];
            function sl() {
                var e = Object(n.useContext)(Or),
                    a = e.isOpenModalIngreso,
                    t = e.SetIsOpenModalIngreso,
                    l = e.guardarAbono,
                    c = e.isLoading,
                    o = e.setIsLoading,
                    i = Object(n.useContext)(da).setIsReload,
                    s = Object(n.useState)(0),
                    u = Object(h.a)(s, 2),
                    m = u[0],
                    d = u[1],
                    p = function () {
                        t(!1);
                    },
                    g = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                return (
                                                    o(!0), (e.next = 3), l(m)
                                                );
                                            case 3:
                                                if (
                                                    ((a = e.sent),
                                                    o(!1),
                                                    200 === a.codigo)
                                                ) {
                                                    e.next = 7;
                                                    break;
                                                }
                                                return e.abrupt("return");
                                            case 7:
                                                t(!1), i(!0);
                                            case 9:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })();
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(
                        Vn.a,
                        {
                            open: a,
                            onClose: p,
                            "aria-labelledby": "form-dialog-title",
                        },
                        r.a.createElement(
                            qn.a,
                            { id: "form-dialog-title" },
                            "Agregar Abono"
                        ),
                        r.a.createElement(
                            Wn.a,
                            null,
                            r.a.createElement(Un.a, null),
                            r.a.createElement(_e.a, {
                                autoFocus: !0,
                                margin: "dense",
                                id: "name",
                                onChange: function (e) {
                                    return d(e.target.value);
                                },
                                label: "$ 0.00",
                                type: "number",
                                fullWidth: !0,
                            })
                        ),
                        r.a.createElement(
                            zn.a,
                            null,
                            r.a.createElement(
                                Y.a,
                                { onClick: p, color: "primary" },
                                "Cancelar"
                            ),
                            r.a.createElement(
                                Y.a,
                                { onClick: g, color: "primary" },
                                "Guardar"
                            )
                        ),
                        c ? r.a.createElement(La.a, null) : null
                    )
                );
            }
            function ul() {
                var e = Object(n.useContext)(Or),
                    a = e.isOpenModalTotal,
                    t = e.SetIsOpenModalTotal,
                    l = e.actualizarTotal,
                    c = e.isLoading,
                    o = e.setIsLoading,
                    i = Object(n.useContext)(da).setIsReload,
                    s = Object(n.useState)(0),
                    u = Object(h.a)(s, 2),
                    m = u[0],
                    d = u[1],
                    p = function () {
                        t(!1);
                    },
                    g = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                return (
                                                    o(!0), (e.next = 3), l(m)
                                                );
                                            case 3:
                                                if (
                                                    ((a = e.sent),
                                                    o(!1),
                                                    200 === a.codigo)
                                                ) {
                                                    e.next = 7;
                                                    break;
                                                }
                                                return e.abrupt("return");
                                            case 7:
                                                t(!1), i(!0);
                                            case 9:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })();
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(
                        Vn.a,
                        {
                            open: a,
                            onClose: p,
                            "aria-labelledby": "form-dialog-title",
                        },
                        r.a.createElement(
                            qn.a,
                            { id: "form-dialog-title" },
                            "Actualizar Total"
                        ),
                        r.a.createElement(
                            Wn.a,
                            null,
                            r.a.createElement(Un.a, null),
                            r.a.createElement(_e.a, {
                                autoFocus: !0,
                                margin: "dense",
                                id: "name",
                                onChange: function (e) {
                                    return d(e.target.value);
                                },
                                label: "$ 0.00",
                                type: "number",
                                fullWidth: !0,
                            })
                        ),
                        r.a.createElement(
                            zn.a,
                            null,
                            r.a.createElement(
                                Y.a,
                                { onClick: p, color: "primary" },
                                "Cancelar"
                            ),
                            r.a.createElement(
                                Y.a,
                                { onClick: g, color: "primary" },
                                "Guardar"
                            )
                        ),
                        c ? r.a.createElement(La.a, null) : null
                    )
                );
            }
            var ml = t(427),
                dl = t.n(ml),
                pl = t(394);
            function gl(e) {
                var a,
                    t,
                    l,
                    c,
                    o = e.inactivo,
                    i = void 0 !== o && o,
                    s = Object(n.useContext)(Or),
                    u = s.state,
                    m = s.setState,
                    d = s.datosImpresion,
                    p = function (e) {
                        m(
                            Object(Te.a)(
                                Object(Te.a)({}, u),
                                {},
                                Object(v.a)({}, e.target.name, e.target.checked)
                            )
                        );
                    };
                return r.a.createElement(
                    Pr.a,
                    { component: "fieldset", style: { marginLeft: "65px" } },
                    r.a.createElement(
                        Ir.a,
                        { component: "legend" },
                        "Estado del equipo"
                    ),
                    r.a.createElement(
                        Tr.a,
                        null,
                        r.a.createElement(
                            fe.a,
                            {
                                component: "label",
                                container: !0,
                                alignItems: "center",
                                spacing: 1,
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        disabled: i,
                                        checked:
                                            null === d ||
                                            void 0 === d ||
                                            null === (a = d.orden) ||
                                            void 0 === a
                                                ? void 0
                                                : a.camara,
                                        onChange: p,
                                        name: "camara",
                                    }),
                                    label: "C\xe1mara",
                                })
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        disabled: i,
                                        checked:
                                            null === d ||
                                            void 0 === d ||
                                            null === (t = d.orden) ||
                                            void 0 === t
                                                ? void 0
                                                : t.teclado,
                                        onChange: p,
                                        name: "teclado",
                                    }),
                                    label: "Teclado",
                                })
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                component: "label",
                                container: !0,
                                alignItems: "center",
                                spacing: 1,
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        disabled: i,
                                        checked:
                                            null === d ||
                                            void 0 === d ||
                                            null === (l = d.orden) ||
                                            void 0 === l
                                                ? void 0
                                                : l.microfono,
                                        onChange: p,
                                        name: "microfono",
                                    }),
                                    label: "Microfono",
                                })
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0 },
                                r.a.createElement(It.a, {
                                    control: r.a.createElement(Kt.a, {
                                        disabled: i,
                                        checked:
                                            null === d ||
                                            void 0 === d ||
                                            null === (c = d.orden) ||
                                            void 0 === c
                                                ? void 0
                                                : c.parlantes,
                                        onChange: p,
                                        name: "parlantes",
                                    }),
                                    label: "Parlantes",
                                })
                            )
                        )
                    )
                );
            }
            var bl = t(54),
                fl = Object(u.a)(function (e) {
                    return {
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        textFieldFecha: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(5),
                            marginBottom: e.spacing(2),
                            width: "27ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                });
            function El(e) {
                var a,
                    t,
                    l,
                    c,
                    o,
                    i,
                    s,
                    u,
                    m,
                    d,
                    p,
                    g,
                    b,
                    f,
                    E,
                    v,
                    x,
                    C,
                    y,
                    w = e.fn_cerrarModal,
                    S = fl(),
                    k = Object(n.useContext)(ra),
                    N = k.currentCliente,
                    P = k.setCurrentCliente,
                    T =
                        (Object(n.useContext)(fr).currentTecnico,
                        Object(n.useContext)(da).setIsReload),
                    F = Object(n.useContext)(Or),
                    _ = F.actualizarIngreso,
                    A = (F.setsINew, F.setReload),
                    R = F.state,
                    B = F.datosImpresion,
                    D = F.setState,
                    L = new Date(
                        null === B ||
                        void 0 === B ||
                        null === (a = B.orden) ||
                        void 0 === a
                            ? void 0
                            : a.fecha
                    ),
                    M = Object(n.useState)(
                        zt.a.format(L, "YYYY-MM-DD HH:mm:ss")
                    ),
                    V = Object(h.a)(M, 2),
                    z = V[0],
                    W = V[1],
                    U = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (t = B.orden) ||
                            void 0 === t
                            ? void 0
                            : t.equipo
                    ),
                    q = Object(h.a)(U, 2),
                    $ = q[0],
                    G = q[1],
                    H = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (l = B.orden) ||
                            void 0 === l
                            ? void 0
                            : l.marca
                    ),
                    X = Object(h.a)(H, 2),
                    K = X[0],
                    J = X[1],
                    Z = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (c = B.orden) ||
                            void 0 === c
                            ? void 0
                            : c.modelo
                    ),
                    Q = Object(h.a)(Z, 2),
                    ee = Q[0],
                    ae = Q[1],
                    te = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (o = B.orden) ||
                            void 0 === o
                            ? void 0
                            : o.serie
                    ),
                    ne = Object(h.a)(te, 2),
                    re = ne[0],
                    le = ne[1],
                    ce = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (i = B.orden) ||
                            void 0 === i
                            ? void 0
                            : i.falla
                    ),
                    oe = Object(h.a)(ce, 2),
                    ie = oe[0],
                    se = oe[1],
                    ue = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (s = B.orden) ||
                            void 0 === s
                            ? void 0
                            : s.trabajo
                    ),
                    me = Object(h.a)(ue, 2),
                    de = me[0],
                    pe = me[1],
                    ge = Object(n.useState)(!1),
                    be = Object(h.a)(ge, 2),
                    fe = be[0],
                    Ee = be[1],
                    he = Object(n.useState)(!1),
                    ve = Object(h.a)(he, 2),
                    xe = ve[0],
                    Oe = ve[1],
                    je = Object(n.useState)(
                        null === B ||
                            void 0 === B ||
                            null === (u = B.orden) ||
                            void 0 === u
                            ? void 0
                            : u.observacion
                    ),
                    Ce = Object(h.a)(je, 2),
                    ye = Ce[0],
                    we = Ce[1],
                    Se = Object(n.useState)(0),
                    ke = Object(h.a)(Se, 2),
                    Ne = (ke[0], ke[1], Object(n.useState)(0)),
                    Ie = Object(h.a)(Ne, 2),
                    Pe = Ie[0],
                    Fe = (Ie[1], Object(n.useState)(0)),
                    Ae = Object(h.a)(Fe, 2);
                Ae[0], Ae[1];
                Object(n.useEffect)(
                    function () {
                        var e, a, t, n;
                        return (
                            console.log("redner Editar ingreso."),
                            P({ cedula: "", nombres: "-SELECCIONE-" }),
                            D({
                                camara:
                                    null === B ||
                                    void 0 === B ||
                                    null === (e = B.orden) ||
                                    void 0 === e
                                        ? void 0
                                        : e.camara,
                                teclado:
                                    null === B ||
                                    void 0 === B ||
                                    null === (a = B.orden) ||
                                    void 0 === a
                                        ? void 0
                                        : a.teclado,
                                microfono:
                                    null === B ||
                                    void 0 === B ||
                                    null === (t = B.orden) ||
                                    void 0 === t
                                        ? void 0
                                        : t.microfono,
                                parlantes:
                                    null === B ||
                                    void 0 === B ||
                                    null === (n = B.orden) ||
                                    void 0 === n
                                        ? void 0
                                        : n.parlantes,
                            }),
                            function () {
                                console.log("Se desmonto el componente."),
                                    P({ cedula: "", telefono: "" });
                            }
                        );
                    },
                    [Pe]
                );
                var Re = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e() {
                                var a, t, n, r, l, c, o, i;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                if (
                                                    void 0 !==
                                                    (null === B ||
                                                    void 0 === B ||
                                                    null === (a = B.orden) ||
                                                    void 0 === a
                                                        ? void 0
                                                        : a.id)
                                                ) {
                                                    e.next = 3;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(
                                                        "No seleccion\xf3 ning\xfan ingreso",
                                                        2
                                                    ),
                                                    e.abrupt("return")
                                                );
                                            case 3:
                                                if ((n = Be()).estado) {
                                                    e.next = 7;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(n.mensaje, 2),
                                                    e.abrupt("return")
                                                );
                                            case 7:
                                                return (
                                                    Oe(!0),
                                                    (r = 1),
                                                    null !==
                                                        localStorage.getItem(
                                                            "user_id"
                                                        ) &&
                                                        (r =
                                                            localStorage.getItem(
                                                                "user_id"
                                                            )),
                                                    (l = {}),
                                                    (c = {}),
                                                    "" !== N.cedula &&
                                                        (l = {
                                                            cliente_id: N.id,
                                                        }),
                                                    fe &&
                                                        (c = {
                                                            user_update_work: r,
                                                        }),
                                                    (o = Object(Te.a)(
                                                        Object(Te.a)(
                                                            {
                                                                id:
                                                                    null ===
                                                                        B ||
                                                                    void 0 ===
                                                                        B ||
                                                                    null ===
                                                                        (t =
                                                                            B.orden) ||
                                                                    void 0 === t
                                                                        ? void 0
                                                                        : t.id,
                                                            },
                                                            l
                                                        ),
                                                        {},
                                                        {
                                                            usuario_id: r,
                                                            fecha: z,
                                                            equipo: $,
                                                            marca: K,
                                                            modelo: ee,
                                                            serie: re,
                                                            falla: ie,
                                                            trabajo: de,
                                                            observacion: ye,
                                                            camara: R.camara,
                                                            teclado: R.teclado,
                                                            microfono:
                                                                R.microfono,
                                                            parlantes:
                                                                R.parlantes,
                                                            last_user_update: r,
                                                        },
                                                        c
                                                    )),
                                                    (e.next = 17),
                                                    _(o)
                                                );
                                            case 17:
                                                if (
                                                    ((i = e.sent),
                                                    Oe(!1),
                                                    200 === i.code)
                                                ) {
                                                    e.next = 22;
                                                    break;
                                                }
                                                return (
                                                    ea.a.error(i.mensaje, 2),
                                                    e.abrupt("return")
                                                );
                                            case 22:
                                                ea.a.success(i.mensaje, 2),
                                                    T(!0),
                                                    A(!0),
                                                    w();
                                            case 26:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function () {
                            return e.apply(this, arguments);
                        };
                    })(),
                    Be = function () {
                        return "" === $
                            ? { estado: !1, mensaje: "Ingrese el equipo" }
                            : "" === K
                            ? { estado: !1, mensaje: "Ingrese la marca" }
                            : "" === ee
                            ? { estado: !1, mensaje: "Ingrese el modelo" }
                            : "" === re
                            ? { estado: !1, mensaje: "Ingrese la serie" }
                            : "" === z
                            ? { estado: !1, mensaje: "Ingrese la Fecha" }
                            : { estado: !0, mensaje: "OK" };
                    };
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        "div",
                        { className: S.root },
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(
                                "center",
                                null,
                                r.a.createElement(
                                    "h3",
                                    null,
                                    "Actualizar Ingreso N\xb0 ",
                                    null === B ||
                                        void 0 === B ||
                                        null === (m = B.orden) ||
                                        void 0 === m
                                        ? void 0
                                        : m.id
                                )
                            ),
                            r.a.createElement("hr", null),
                            r.a.createElement("br", null),
                            r.a.createElement(
                                "div",
                                { className: S.root },
                                r.a.createElement(_e.a, {
                                    id: "fecha",
                                    label: "Fecha Ingreso",
                                    type: "datetime-local",
                                    onChange: function (e) {
                                        return W(e.target.value);
                                    },
                                    defaultValue: z,
                                    className: S.textFieldFecha,
                                    disabled:
                                        !bl[
                                            localStorage.getItem("tipo_usuario")
                                        ].fecha,
                                    InputLabelProps: { shrink: !0 },
                                }),
                                r.a.createElement(Xt, {
                                    ancho: 400,
                                    selectInactive:
                                        !bl[
                                            localStorage.getItem("tipo_usuario")
                                        ].cliente,
                                    disabled: !0,
                                    concatenarCedula: !0,
                                    defaultCliete: {
                                        id_cliente:
                                            null === B ||
                                            void 0 === B ||
                                            null === (d = B.orden) ||
                                            void 0 === d
                                                ? void 0
                                                : d.cliente_id,
                                        cedula:
                                            null === B ||
                                            void 0 === B ||
                                            null === (p = B.cliente) ||
                                            void 0 === p
                                                ? void 0
                                                : p.cedula,
                                        nombres:
                                            null === B ||
                                            void 0 === B ||
                                            null === (g = B.cliente) ||
                                            void 0 === g
                                                ? void 0
                                                : g.nombres,
                                    },
                                })
                            ),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Equipo",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .equipo,
                                id: "margin-none",
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (b = B.orden) ||
                                    void 0 === b
                                        ? void 0
                                        : b.equipo,
                                onChange: function (e) {
                                    return G(e.target.value);
                                },
                                className: S.textField1,
                                helperText: "P. Ej. CPU",
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Marca",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .marca,
                                id: "margin-none",
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (f = B.orden) ||
                                    void 0 === f
                                        ? void 0
                                        : f.marca,
                                onChange: function (e) {
                                    return J(e.target.value);
                                },
                                className: S.textField1,
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Modelo",
                                id: "margin-none",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .modelo,
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (E = B.orden) ||
                                    void 0 === E
                                        ? void 0
                                        : E.modelo,
                                onChange: function (e) {
                                    return ae(e.target.value);
                                },
                                className: S.textField1,
                                helperText: "",
                            }),
                            r.a.createElement(_e.a, {
                                required: !0,
                                label: "Serie",
                                id: "margin-none",
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (v = B.orden) ||
                                    void 0 === v
                                        ? void 0
                                        : v.serie,
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .serie,
                                onChange: function (e) {
                                    return le(e.target.value);
                                },
                                className: S.textField1,
                                helperText: "",
                            }),
                            r.a.createElement(gl, {
                                inactivo:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .serie,
                            }),
                            r.a.createElement(_e.a, {
                                id: "standard-full-width",
                                onChange: function (e) {
                                    return se(e.target.value);
                                },
                                label: "Falla",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .falla,
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (x = B.orden) ||
                                    void 0 === x
                                        ? void 0
                                        : x.falla,
                                style: { margin: 8, width: "90%" },
                                placeholder: "",
                                multiline: !0,
                                helperText: "P. Ej. No enciende",
                                margin: "normal",
                                InputLabelProps: { shrink: !0 },
                            }),
                            r.a.createElement(_e.a, {
                                id: "standard-full-width",
                                onChange: function (e) {
                                    return (function (e) {
                                        Ee(!0), pe(e.target.value);
                                    })(e);
                                },
                                label: "Trabajo",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .trabajo,
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (C = B.orden) ||
                                    void 0 === C
                                        ? void 0
                                        : C.trabajo,
                                style: {
                                    margin: 8,
                                    width: "90%",
                                    fontSize: "50",
                                },
                                placeholder: "",
                                multiline: !0,
                                helperText: "P. Ej. Se repar\xf3 circuito",
                                margin: "normal",
                                InputProps: { style: { fontSize: 25 } },
                                InputLabelProps: { shrink: !0 },
                            })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                id: "filled-full-width",
                                label: "Observaci\xf3n",
                                disabled:
                                    !bl[localStorage.getItem("tipo_usuario")]
                                        .observacion,
                                defaultValue:
                                    null === B ||
                                    void 0 === B ||
                                    null === (y = B.orden) ||
                                    void 0 === y
                                        ? void 0
                                        : y.observacion,
                                style: {
                                    margin: "3px 10px 3px 3px",
                                    width: "425px",
                                },
                                placeholder: "",
                                helperText: "",
                                fullWidth: !0,
                                margin: "normal",
                                onChange: function (e) {
                                    return we(e.target.value);
                                },
                                InputLabelProps: { shrink: !0 },
                                variant: "filled",
                            })
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement(_e.a, {
                                disabled: !0,
                                id: "standard-disabled",
                                label: "Usuario",
                                value: localStorage.getItem("nombres"),
                            })
                        )
                    ),
                    r.a.createElement(
                        I.a,
                        { display: "flex", justifyContent: "flex-end" },
                        r.a.createElement(
                            Y.a,
                            {
                                variant: "contained",
                                className: S.btn,
                                disabled: xe,
                                onClick: w,
                            },
                            "Cancelar"
                        ),
                        r.a.createElement(
                            Y.a,
                            {
                                color: "primary",
                                disabled: xe,
                                variant: "contained",
                                onClick: Re,
                            },
                            xe ? "Actualizando..." : "Guardar"
                        )
                    )
                );
            }
            var hl = Object(u.a)(function (e) {
                    return {
                        appBar: { position: "relative" },
                        title: { marginLeft: e.spacing(2), flex: 1 },
                    };
                }),
                vl = r.a.forwardRef(function (e, a) {
                    return r.a.createElement(
                        pl.a,
                        Object.assign({ direction: "up", ref: a }, e)
                    );
                }),
                xl = function (e) {
                    e.orden;
                    var a = hl(),
                        t = Object(n.useContext)(Or),
                        l = t.openModalIngreso,
                        c = t.setOpenModalIngreso,
                        o = function () {
                            c(!1);
                        };
                    return r.a.createElement(
                        "div",
                        null,
                        r.a.createElement(
                            Vn.a,
                            {
                                fullScreen: !0,
                                open: l,
                                onClose: o,
                                TransitionComponent: vl,
                            },
                            r.a.createElement(
                                Z.a,
                                { className: a.appBar },
                                r.a.createElement(
                                    Q.a,
                                    null,
                                    r.a.createElement(
                                        ee.a,
                                        {
                                            edge: "start",
                                            color: "inherit",
                                            onClick: o,
                                            "aria-label": "close",
                                        },
                                        r.a.createElement(dl.a, null)
                                    ),
                                    r.a.createElement(
                                        T.a,
                                        { variant: "h6", className: a.title },
                                        "Actualizaci\xf3n de ingresos"
                                    )
                                )
                            ),
                            r.a.createElement(El, { fn_cerrarModal: o })
                        )
                    );
                };
            function Ol() {
                var e = n.useState(!1),
                    a = Object(h.a)(e, 2),
                    t = a[0],
                    r = a[1],
                    l = n.useState(cl),
                    c = Object(h.a)(l, 2),
                    o = c[0],
                    i = c[1],
                    s = n.useContext(Or),
                    u = s.ordenes,
                    m = s.ordenesTemp,
                    d = s.actualizarIngreso,
                    p = (s.setReload, s.PrepararDatosImpresion),
                    g =
                        (s.SetIsOpenModalIngreso,
                        s.SetIsOpenModalTotal,
                        s.setOrdenes),
                    b = s.setDefinirFactura;
                n.useEffect(function () {
                    "ATENCION AL PUBLICO" ===
                        localStorage.getItem("tipo_usuario") && i(ol),
                        "TECNICO" === localStorage.getItem("tipo_usuario") &&
                            i(il);
                }, []);
                var f = (function () {
                    var e = Object(j.a)(
                        O.a.mark(function e(a, t) {
                            var n;
                            return O.a.wrap(function (e) {
                                for (;;)
                                    switch ((e.prev = e.next)) {
                                        case 0:
                                            return r(!0), (e.next = 4), d(a);
                                        case 4:
                                            if (
                                                ((n = e.sent),
                                                r(!1),
                                                200 === n.code)
                                            ) {
                                                e.next = 9;
                                                break;
                                            }
                                            return (
                                                ea.a.error(n.mensaje, 2),
                                                e.abrupt("return")
                                            );
                                        case 9:
                                            ea.a.success(n.mensaje, 2);
                                        case 10:
                                        case "end":
                                            return e.stop();
                                    }
                            }, e);
                        })
                    );
                    return function (a, t) {
                        return e.apply(this, arguments);
                    };
                })();
                return n.createElement(
                    Oe.a,
                    null,
                    n.createElement(sl, null),
                    n.createElement(ul, null),
                    n.createElement(xl, null),
                    n.createElement(
                        "div",
                        {
                            style: {
                                height: 360,
                                width: "100%",
                                cursor: "pointer",
                            },
                        },
                        n.createElement(ya.a, {
                            rows: m,
                            columns: o,
                            datasets: "Commodity",
                            onEditCellChangeCommitted: function (e) {
                                var a = e.field,
                                    t = [],
                                    n = u.map(function (n) {
                                        return n.id === e.id
                                            ? ("fecha" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { fecha: e.props.value }
                                                  )),
                                              "equipo" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { equipo: e.props.value }
                                                  )),
                                              "marca" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { marca: e.props.value }
                                                  )),
                                              "modelo" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { modelo: e.props.value }
                                                  )),
                                              "falla" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { falla: e.props.value }
                                                  )),
                                              "trabajo" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          user_update_work:
                                                              localStorage.getItem(
                                                                  "user_id"
                                                              ),
                                                          trabajo:
                                                              e.props.value,
                                                      }
                                                  )),
                                              "total" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { total: e.props.value }
                                                  )),
                                              "abono" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      { abono: e.props.value }
                                                  )),
                                              "observacion" === a &&
                                                  (t = Object(Te.a)(
                                                      Object(Te.a)({}, n),
                                                      {},
                                                      {
                                                          observacion:
                                                              e.props.value,
                                                      }
                                                  )),
                                              f(t, a),
                                              console.log("Ingreso Nuevo", t),
                                              t)
                                            : n;
                                    });
                                g(n);
                            },
                            pageSize: 10,
                            checkboxSelection: !1,
                            disableSelectionOnClick: !1,
                            rowHeight: 23,
                            loading: t,
                            onRowSelected: function (e) {
                                localStorage.setItem("idIngreso", e.data.id),
                                    void 0 !== e.data.factura_relacionada &&
                                    null !== e.data.factura_relacionada &&
                                    -1 !== e.data.factura_relacionada
                                        ? b(!1)
                                        : b(!0),
                                    p(e.data);
                            },
                        })
                    )
                );
            }
            var jl = Object(u.a)(function (e) {
                    return {
                        root: {
                            backgroundColor: e.palette.background.dark,
                            minHeight: "100%",
                            paddingBottom: e.spacing(3),
                            paddingTop: e.spacing(3),
                        },
                        productCard: { height: "100%" },
                    };
                }),
                Cl = function () {
                    var e = jl();
                    Object(n.useContext)(pt).productos;
                    return r.a.createElement(
                        he,
                        { className: e.root, title: "Clientes" },
                        r.a.createElement(
                            be.a,
                            { maxWidth: !1 },
                            r.a.createElement(ll, null),
                            r.a.createElement(
                                I.a,
                                { mt: 3 },
                                r.a.createElement(Ol, null)
                            )
                        )
                    );
                },
                yl = t(428),
                wl = t.n(yl),
                Sl = Object(u.a)(function (e) {
                    return {
                        root: {},
                        importButton: { marginRight: e.spacing(1) },
                        exportButton: { marginRight: e.spacing(1) },
                    };
                }),
                kl = function () {
                    Sl();
                    var e = Object(n.useContext)(da),
                        a =
                            (e.historicofacturas,
                            e.cargarHistoricoFacturasFilter);
                    return r.a.createElement(
                        je.a,
                        {
                            style: {
                                backgroundColor: "white",
                                textAlign: "center",
                            },
                        },
                        r.a.createElement(
                            I.a,
                            { maxWidth: 500 },
                            r.a.createElement(_e.a, {
                                fullWidth: !0,
                                onKeyDown: function (e) {
                                    "Enter" === e.key && a(e.target.value);
                                },
                                InputProps: {
                                    startAdornment: r.a.createElement(
                                        Je.a,
                                        { position: "start" },
                                        r.a.createElement(
                                            Ze.a,
                                            {
                                                fontSize: "small",
                                                color: "action",
                                            },
                                            r.a.createElement(ca.a, null)
                                        )
                                    ),
                                },
                                placeholder: "Buscar Facturas.",
                                variant: "outlined",
                            })
                        )
                    );
                },
                Nl = Object(u.a)(function (e) {
                    return {
                        container: {
                            display: "grid",
                            gridTemplateColumns: "repeat(12, 1fr)",
                            gridGap: e.spacing(3),
                        },
                        paper: {
                            padding: e.spacing(0),
                            textAlign: "center",
                            color: e.palette.text.secondary,
                            whiteSpace: "nowrap",
                            marginBottom: e.spacing(0),
                            marginTop: e.spacing(0),
                        },
                        divider: { margin: e.spacing(2, 0) },
                    };
                }),
                Il = function (e) {
                    return (function (e) {
                        var a =
                                arguments.length > 1 && void 0 !== arguments[1]
                                    ? arguments[1]
                                    : 0,
                            t = e.toString(),
                            n = (t.length, t.indexOf(".") + 1),
                            r = t.substr(0, n + a);
                        return Number(r);
                    })(e / 1.12, 4);
                };
            function Pl(e) {
                var a = e.producto;
                Nl();
                return r.a.createElement(
                    "div",
                    {
                        style: { height: "24px" },
                        key:
                            (null === a || void 0 === a ? void 0 : a.id) +
                            (null === a || void 0 === a
                                ? void 0
                                : a.tipoPrecio),
                    },
                    r.a.createElement(
                        fe.a,
                        {
                            container: !0,
                            spacing: 0,
                            margin: 0,
                            style: {
                                fontSize: "11px",
                                marginTop: "3px",
                                marginBottom: "-2px",
                            },
                        },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 1 },
                            r.a.createElement(
                                "strong",
                                null,
                                " ",
                                null === a || void 0 === a
                                    ? void 0
                                    : a.cantidad,
                                " "
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                item: !0,
                                xs: 7,
                                title:
                                    null === a || void 0 === a
                                        ? void 0
                                        : a.producto,
                            },
                            null === a || void 0 === a ? void 0 : a.producto
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                item: !0,
                                xs: 2,
                                style: { backgroundColor: "#cef2e6" },
                            },
                            "publico" ===
                                (null === a || void 0 === a
                                    ? void 0
                                    : a.precio_tipo)
                                ? Il(
                                      null === a || void 0 === a
                                          ? void 0
                                          : a.precio_publico
                                  )
                                : "",
                            "tecnico" ===
                                (null === a || void 0 === a
                                    ? void 0
                                    : a.precio_tipo)
                                ? Il(
                                      null === a || void 0 === a
                                          ? void 0
                                          : a.precio_tecnico
                                  )
                                : "",
                            "mayorista" ===
                                (null === a || void 0 === a
                                    ? void 0
                                    : a.precio_tipo)
                                ? Il(
                                      null === a || void 0 === a
                                          ? void 0
                                          : a.precio_distribuidor
                                  )
                                : ""
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 2 },
                            Il(null === a || void 0 === a ? void 0 : a.total)
                        )
                    )
                );
            }
            var Tl = Object(u.a)(function (e) {
                return {
                    container: {
                        display: "grid",
                        gridTemplateColumns: "repeat(12, 1fr)",
                        gridGap: e.spacing(0),
                        fontSize: "12px",
                    },
                    paper: {
                        padding: e.spacing(0),
                        textAlign: "center",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(1),
                    },
                    paperRight: {
                        padding: e.spacing(0),
                        textAlign: "Right",
                        color: e.palette.text.secondary,
                        whiteSpace: "nowrap",
                        marginBottom: e.spacing(0),
                    },
                    divider: { margin: e.spacing(2, 0) },
                };
            });
            function Fl(e) {
                var a = e.totales,
                    t = Tl(),
                    l = Object(n.useContext)(Ut).observacion;
                return r.a.createElement(
                    "div",
                    null,
                    r.a.createElement(F.a, { className: t.divider }),
                    r.a.createElement(
                        "div",
                        { className: t.container },
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL 12% $: "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL 0% :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " 0.00"
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "DESCUENTO 0% :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " 0.00"
                            )
                        ),
                        r.a.createElement(
                            "div",
                            {
                                style: {
                                    gridColumnEnd: "span 8",
                                    height: "24px",
                                },
                            },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "SUBTOTAL :$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.subtotal
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "IVA 12%:$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " ",
                                a.iva
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 8" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paperRight },
                                "VALOR TOTAL:$ "
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 4" } },
                            r.a.createElement(
                                Bt.a,
                                { className: t.paper },
                                " $ ",
                                a.total
                            )
                        ),
                        r.a.createElement(
                            "div",
                            { style: { gridColumnEnd: "span 9" } },
                            r.a.createElement(
                                Bt.a,
                                {
                                    className: t.paperRight,
                                    style: { textAlign: "left" },
                                },
                                "Observaciones: ",
                                l
                            )
                        ),
                        r.a.createElement("div", {
                            style: {
                                gridColumnEnd: "span 3",
                                textAlign: "center",
                            },
                        })
                    )
                );
            }
            var _l = Object(u.a)(function (e) {
                    return {
                        container: {
                            display: "grid",
                            gridTemplateColumns: "repeat(12, 1fr)",
                            gridGap: e.spacing(3),
                        },
                        paper: {
                            padding: e.spacing(1),
                            textAlign: "left",
                            color: e.palette.text.secondary,
                            whiteSpace: "nowrap",
                            marginBottom: e.spacing(0),
                        },
                        divider: { margin: e.spacing(1, 0) },
                    };
                }),
                Al = r.a.forwardRef(function (e, a) {
                    var t,
                        l,
                        c,
                        o,
                        i,
                        s = _l(),
                        u = e.dataFactura;
                    Object(n.useEffect)(function () {}, []);
                    var m = u.factura;
                    return r.a.createElement(
                        "div",
                        { ref: a, style: { width: "50%", marginLeft: "19px" } },
                        r.a.createElement("img", {
                            className: "imagenImpresion",
                            src: En,
                        }),
                        r.a.createElement(
                            T.a,
                            { variant: "subtitle1", gutterBottom: !0 },
                            r.a.createElement(
                                "center",
                                null,
                                "N\xb0 Control ",
                                null === m || void 0 === m ? void 0 : m.id,
                                " ",
                                (null === m || void 0 === m
                                    ? void 0
                                    : m.es_credito) && " (credito)"
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                container: !0,
                                spacing: 0,
                                style: { fontSize: "12px" },
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 12 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: s.paper },
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " CI:"
                                        ),
                                        " ",
                                        null === m ||
                                            void 0 === m ||
                                            null === (t = m.cliente) ||
                                            void 0 === t
                                            ? void 0
                                            : t.cedula
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Cliente:"
                                        ),
                                        " ",
                                        null === m ||
                                            void 0 === m ||
                                            null === (l = m.cliente) ||
                                            void 0 === l
                                            ? void 0
                                            : l.nombres
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Telf.:"
                                        ),
                                        " ",
                                        null === m ||
                                            void 0 === m ||
                                            null === (c = m.cliente) ||
                                            void 0 === c
                                            ? void 0
                                            : c.telefono
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Dir.:"
                                        ),
                                        " ",
                                        null === m ||
                                            void 0 === m ||
                                            null === (o = m.cliente) ||
                                            void 0 === o
                                            ? void 0
                                            : o.direccion
                                    ),
                                    r.a.createElement(
                                        "div",
                                        null,
                                        r.a.createElement(
                                            "strong",
                                            null,
                                            " Fecha:"
                                        ),
                                        " ",
                                        null === m || void 0 === m
                                            ? void 0
                                            : m.fecha
                                    )
                                )
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            {
                                container: !0,
                                spacing: 0,
                                style: { fontSize: "12px" },
                            },
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 1 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: s.paper },
                                    "Cant."
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 7 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: s.paper },
                                    "Nombre producto"
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 2 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: s.paper },
                                    "Precio U."
                                )
                            ),
                            r.a.createElement(
                                fe.a,
                                { item: !0, xs: 2 },
                                r.a.createElement(
                                    Bt.a,
                                    { className: s.paper },
                                    "Total"
                                )
                            )
                        ),
                        r.a.createElement(
                            "div",
                            null,
                            null === m ||
                                void 0 === m ||
                                null === (i = m.detalles) ||
                                void 0 === i
                                ? void 0
                                : i.map(function (e) {
                                      return r.a.createElement(Pl, {
                                          key:
                                              (null === e || void 0 === e
                                                  ? void 0
                                                  : e.id) +
                                              (null === e || void 0 === e
                                                  ? void 0
                                                  : e.tipoPrecio),
                                          producto: e,
                                      });
                                  })
                        ),
                        r.a.createElement(Fl, {
                            key: 1,
                            totales:
                                null === m || void 0 === m ? void 0 : m.totales,
                        })
                    );
                }),
                Rl = Object(u.a)({
                    root: { "& > *": { borderBottom: "unset" } },
                });
            function Bl(e) {
                var a = e.row,
                    t = e.imprimirFactura,
                    l = r.a.useState(!1),
                    c = Object(h.a)(l, 2),
                    o = c[0],
                    i = c[1],
                    s = Rl(),
                    u = Object(n.useContext)(da),
                    m = u.fn_anularFactura,
                    d = u.setIsReload;
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        Ue.a,
                        { className: s.root },
                        r.a.createElement(
                            qe.a,
                            null,
                            r.a.createElement(
                                ee.a,
                                {
                                    "aria-label": "expand row",
                                    size: "small",
                                    onClick: function () {
                                        return i(!o);
                                    },
                                },
                                o
                                    ? r.a.createElement(Kn.a, null)
                                    : r.a.createElement(Hn.a, null)
                            )
                        ),
                        r.a.createElement(qe.a, { align: "left" }, a.id),
                        r.a.createElement(
                            qe.a,
                            { component: "th", scope: "row" },
                            a.cliente
                        ),
                        r.a.createElement(qe.a, { align: "left" }, a.fecha),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            "$ ",
                            a.total
                        ),
                        r.a.createElement(
                            qe.a,
                            { align: "right" },
                            a.observacion
                        ),
                        r.a.createElement(qe.a, { align: "right" }, a.estado),
                        bl[localStorage.getItem("tipo_usuario")][
                            "anular factura"
                        ] &&
                            r.a.createElement(
                                qe.a,
                                { align: "right" },
                                r.a.createElement(el.a, {
                                    title: "Reimprimir Factura",
                                    onClick: function () {
                                        return t(a.id, a.estado);
                                    },
                                    style: { cursor: "pointer" },
                                }),
                                r.a.createElement(wl.a, {
                                    title: "Anular Factura",
                                    onClick: function () {
                                        return (
                                            (e = a.id),
                                            void ("cerrada" === a.estado
                                                ? Ke.a
                                                      .fire({
                                                          title: "\xbfEst\xe1 seguro de Anular la Factura?",
                                                          showDenyButton: !0,
                                                          confirmButtonText:
                                                              "si, Anular",
                                                          denyButtonText:
                                                              "Cancelar",
                                                      })
                                                      .then(
                                                          (function () {
                                                              var a = Object(
                                                                  j.a
                                                              )(
                                                                  O.a.mark(
                                                                      function a(
                                                                          t
                                                                      ) {
                                                                          var n;
                                                                          return O.a.wrap(
                                                                              function (
                                                                                  a
                                                                              ) {
                                                                                  for (;;)
                                                                                      switch (
                                                                                          (a.prev =
                                                                                              a.next)
                                                                                      ) {
                                                                                          case 0:
                                                                                              if (
                                                                                                  !t.isConfirmed
                                                                                              ) {
                                                                                                  a.next = 5;
                                                                                                  break;
                                                                                              }
                                                                                              return (
                                                                                                  (a.next = 3),
                                                                                                  m(
                                                                                                      e
                                                                                                  )
                                                                                              );
                                                                                          case 3:
                                                                                              200 ===
                                                                                              (n =
                                                                                                  a.sent)
                                                                                                  .codigo
                                                                                                  ? (Ke.a.fire(
                                                                                                        n.mensaje,
                                                                                                        "",
                                                                                                        "success"
                                                                                                    ),
                                                                                                    d(
                                                                                                        !0
                                                                                                    ))
                                                                                                  : Ke.a.fire(
                                                                                                        n.mensaje,
                                                                                                        "",
                                                                                                        "warning"
                                                                                                    );
                                                                                          case 5:
                                                                                          case "end":
                                                                                              return a.stop();
                                                                                      }
                                                                              },
                                                                              a
                                                                          );
                                                                      }
                                                                  )
                                                              );
                                                              return function (
                                                                  e
                                                              ) {
                                                                  return a.apply(
                                                                      this,
                                                                      arguments
                                                                  );
                                                              };
                                                          })()
                                                      )
                                                : Ke.a.fire(
                                                      "No permitido.",
                                                      "",
                                                      "warning"
                                                  ))
                                        );
                                        var e;
                                    },
                                    style: { cursor: "pointer" },
                                })
                            )
                    ),
                    r.a.createElement(
                        Ue.a,
                        null,
                        r.a.createElement(
                            qe.a,
                            {
                                style: { paddingBottom: 0, paddingTop: 0 },
                                colSpan: 6,
                            },
                            r.a.createElement(
                                Yn.a,
                                { in: o, timeout: "auto", unmountOnExit: !0 },
                                r.a.createElement(
                                    I.a,
                                    { margin: 1 },
                                    r.a.createElement(
                                        T.a,
                                        {
                                            variant: "h6",
                                            gutterBottom: !0,
                                            component: "div",
                                        },
                                        "Detalles"
                                    ),
                                    r.a.createElement(
                                        ze.a,
                                        {
                                            size: "small",
                                            "aria-label": "purchases",
                                        },
                                        r.a.createElement(
                                            We.a,
                                            null,
                                            r.a.createElement(
                                                Ue.a,
                                                null,
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    "Cant."
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    null,
                                                    "Producto"
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    { align: "center" },
                                                    "Total Item ($)"
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    { align: "right" },
                                                    "Tipo Precio"
                                                )
                                            )
                                        ),
                                        r.a.createElement(
                                            $e.a,
                                            null,
                                            a.detalles.map(function (e) {
                                                return r.a.createElement(
                                                    Ue.a,
                                                    { key: "d" + e.id },
                                                    r.a.createElement(
                                                        qe.a,
                                                        {
                                                            component: "th",
                                                            scope: "row",
                                                        },
                                                        e.cantidad
                                                    ),
                                                    r.a.createElement(
                                                        qe.a,
                                                        null,
                                                        e.producto
                                                    ),
                                                    r.a.createElement(
                                                        qe.a,
                                                        { align: "center" },
                                                        "$",
                                                        " ",
                                                        e.subtotal
                                                    ),
                                                    r.a.createElement(
                                                        qe.a,
                                                        { align: "right" },
                                                        e.precio_tipo
                                                    )
                                                );
                                            })
                                        )
                                    )
                                )
                            )
                        )
                    )
                );
            }
            function Dl() {
                var e = Object(n.useContext)(da).historicofacturas,
                    a = Object(n.useContext)(Ut),
                    t = a.fn_obtenerFactura,
                    l =
                        (a.factura,
                        Object(n.useState)({
                            loading: !1,
                            datos: { id: 1111 },
                        })),
                    c = Object(h.a)(l, 2),
                    o = c[0],
                    i = c[1],
                    s = Object(n.useState)(!1),
                    u = Object(h.a)(s, 2),
                    m = (u[0], u[1]),
                    d = Object(n.useRef)(),
                    p = Object(Wt.useReactToPrint)({
                        content: function () {
                            return d.current;
                        },
                        onAfterPrint: function () {},
                    }),
                    g = (function () {
                        var e = Object(j.a)(
                            O.a.mark(function e(a, n) {
                                var r;
                                return O.a.wrap(function (e) {
                                    for (;;)
                                        switch ((e.prev = e.next)) {
                                            case 0:
                                                return (e.next = 2), t(a);
                                            case 2:
                                                (r = e.sent),
                                                    m(a),
                                                    i({
                                                        loading: !0,
                                                        factura: r.factura,
                                                    }),
                                                    p();
                                            case 6:
                                            case "end":
                                                return e.stop();
                                        }
                                }, e);
                            })
                        );
                        return function (a, t) {
                            return e.apply(this, arguments);
                        };
                    })();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(
                        "div",
                        { style: { display: "none" } },
                        o.loading &&
                            r.a.createElement(Al, {
                                ref: d,
                                dataFactura: o.factura,
                            })
                    ),
                    r.a.createElement(
                        "center",
                        null,
                        r.a.createElement("h1", null, "Historico de facturas")
                    ),
                    r.a.createElement(kl, null),
                    r.a.createElement(
                        Dn.a,
                        { component: Bt.a },
                        r.a.createElement(
                            ze.a,
                            { "aria-label": "collapsible table" },
                            r.a.createElement(
                                We.a,
                                null,
                                r.a.createElement(
                                    Ue.a,
                                    null,
                                    r.a.createElement(qe.a, null),
                                    r.a.createElement(qe.a, null, "N\xb0 Fac"),
                                    r.a.createElement(qe.a, null, "Cliente"),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "left" },
                                        "Fecha"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Total"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Observaci\xf3n"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Estatus"
                                    ),
                                    bl[localStorage.getItem("tipo_usuario")][
                                        "anular factura"
                                    ] &&
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            "Acciones"
                                        )
                                )
                            ),
                            r.a.createElement(
                                $e.a,
                                null,
                                e.map(function (e, a) {
                                    return r.a.createElement(Bl, {
                                        key: a,
                                        row: e.factura,
                                        imprimirFactura: g,
                                    });
                                })
                            )
                        )
                    )
                );
            }
            var Ll = function () {
                    return r.a.createElement("h1", null, "Pantalla pedidos");
                },
                Ml = t(617),
                Vl = t(613),
                zl = (t(689), t(694), t(690), t(429)),
                Wl = t.n(zl),
                Ul = t(430),
                ql = t.n(Ul),
                $l = t(431),
                Yl = t.n($l);
            t(433),
                Object(u.a)(function (e) {
                    return {
                        root: {
                            height: 380,
                            transform: "translateZ(0px)",
                            flexGrow: 1,
                        },
                        speedDial: {
                            position: "absolute",
                            bottom: e.spacing(2),
                            right: e.spacing(2),
                        },
                    };
                }),
                Wl.a,
                mn.a,
                el.a,
                ql.a,
                Yl.a;
            var Gl = Object(u.a)(function (e) {
                    return {
                        fab: {
                            position: "absolute",
                            bottom: "2rem",
                            right: "2rem",
                        },
                    };
                }),
                Hl = function (e) {
                    var a = e.ComponentToPrint,
                        t = Object(n.useRef)(),
                        l = Object(Wt.useReactToPrint)({
                            content: function () {
                                return t.current;
                            },
                        });
                    Object(n.useEffect)(function () {}, []);
                    var c = Gl();
                    return r.a.createElement(
                        "div",
                        null,
                        r.a.createElement(
                            cn.a,
                            {
                                color: "primary",
                                "aria-label": "add",
                                className: c.fab,
                                onClick: l,
                            },
                            r.a.createElement(el.a, null)
                        ),
                        r.a.createElement(
                            "div",
                            { style: { display: "none" } },
                            r.a.createElement(Xl, { ref: t, component: a })
                        )
                    );
                },
                Xl = r.a.forwardRef(function (e, a) {
                    return r.a.createElement(
                        "div",
                        { ref: a },
                        r.a.createElement(e.component, null)
                    );
                }),
                Kl = Object(n.createContext)(),
                Jl = "api/reportes/ventas-diarias",
                Zl = "api/reportes/ingresos-empleado",
                Ql = function (e) {
                    var a = Object(n.useState)({
                            total_ventas: 0,
                            facturas: [],
                            ordenes: [],
                            creditos: [],
                        }),
                        t = Object(h.a)(a, 2),
                        l = t[0],
                        c = t[1],
                        o = Object(n.useState)({
                            total_ventas: 0,
                            ventasEmpleados: [],
                        }),
                        i = Object(h.a)(o, 2),
                        s = i[0],
                        u = i[1],
                        m = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a, t) {
                                    var n;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(Jl, {
                                                            fecha_desde: a,
                                                            fecha_hasta: t,
                                                        })
                                                    );
                                                case 2:
                                                    (n = e.sent), c(n.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a, t) {
                                return e.apply(this, arguments);
                            };
                        })(),
                        d = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e(a, t) {
                                    var n;
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        (e.next = 2),
                                                        y.post(Zl, {
                                                            fecha_desde: a,
                                                            fecha_hasta: t,
                                                        })
                                                    );
                                                case 2:
                                                    (n = e.sent), u(n.data);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function (a, t) {
                                return e.apply(this, arguments);
                            };
                        })();
                    return (
                        Object(n.useEffect)(function () {}, [l, s]),
                        r.a.createElement(
                            r.a.Fragment,
                            null,
                            r.a.createElement(
                                Kl.Provider,
                                {
                                    value: {
                                        ventasDiarias: l,
                                        getReporteVentasDiaras: m,
                                        ingresosXepleado: s,
                                        getReporteIngresosXempleado: d,
                                    },
                                },
                                e.children
                            )
                        )
                    );
                },
                ec = t(296),
                ac = t.n(ec),
                tc = function () {
                    var e = new Date();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            "center",
                            null,
                            r.a.createElement("h1", null, "Reporte de ventas")
                        ),
                        r.a.createElement("strong", null, "Fecha Reporte"),
                        ": ",
                        zt.a.format(e, "YYYY-MM-DD"),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement("strong", null, "Generado por: "),
                            " ",
                            localStorage.getItem("nombres")
                        )
                    );
                },
                nc = Object(u.a)(function (e) {
                    return {
                        table: { minWidth: 650 },
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        textFieldFecha: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(5),
                            marginBottom: e.spacing(2),
                            width: "25ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                });
            function rc() {
                var e = Object(n.useContext)(Kl).ventasDiarias,
                    a = nc();
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(tc, null),
                    r.a.createElement(
                        "h3",
                        null,
                        "Total Ventas $ ",
                        e.total_ventas
                    ),
                    r.a.createElement(
                        Dn.a,
                        { component: Bt.a },
                        r.a.createElement(
                            ze.a,
                            {
                                className: a.table,
                                size: "small",
                                "aria-label": "a dense table",
                            },
                            r.a.createElement(
                                We.a,
                                null,
                                r.a.createElement(
                                    Ue.a,
                                    null,
                                    r.a.createElement(qe.a, null, "Cliente"),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Fecha"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Observaci\xf3n"
                                    ),
                                    r.a.createElement(
                                        qe.a,
                                        { align: "right" },
                                        "Total"
                                    )
                                )
                            ),
                            r.a.createElement(
                                $e.a,
                                null,
                                r.a.createElement(
                                    Ue.a,
                                    {
                                        style: { backgroundColor: "#e6e6e6" },
                                        key: "rowFacturas01",
                                    },
                                    r.a.createElement(
                                        qe.a,
                                        {
                                            component: "th",
                                            colSpan: 5,
                                            scope: "row",
                                        },
                                        r.a.createElement(
                                            "center",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Facturas (",
                                                e.facturas.length,
                                                ")"
                                            )
                                        )
                                    )
                                ),
                                e.facturas.map(function (e) {
                                    return r.a.createElement(
                                        Ue.a,
                                        { key: "rptF" + e.idControl },
                                        r.a.createElement(
                                            qe.a,
                                            { component: "th", scope: "row" },
                                            e.cliente
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            e.fecha
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            null === e.observacion
                                                ? "-"
                                                : e.observacion
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            "$ ",
                                            e.totalAbono
                                        )
                                    );
                                }),
                                r.a.createElement(
                                    Ue.a,
                                    {
                                        style: { backgroundColor: "#e6e6e6" },
                                        key: "rowIngres01",
                                    },
                                    r.a.createElement(
                                        qe.a,
                                        {
                                            component: "th",
                                            colSpan: 5,
                                            scope: "row",
                                        },
                                        r.a.createElement(
                                            "center",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Ingresos (",
                                                e.ordenes.length,
                                                ") "
                                            )
                                        )
                                    )
                                ),
                                e.ordenes.map(function (e) {
                                    return r.a.createElement(
                                        Ue.a,
                                        { key: "rptF" + e.idControl },
                                        r.a.createElement(
                                            qe.a,
                                            { component: "th", scope: "row" },
                                            e.cliente
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            e.fecha
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            null === e.observacion
                                                ? "-"
                                                : e.observacion
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            "$ ",
                                            e.totalAbono
                                        )
                                    );
                                }),
                                r.a.createElement(
                                    Ue.a,
                                    {
                                        style: { backgroundColor: "#e6e6e6" },
                                        key: "rowOrd01",
                                    },
                                    r.a.createElement(
                                        qe.a,
                                        {
                                            component: "th",
                                            colSpan: 5,
                                            scope: "row",
                                        },
                                        r.a.createElement(
                                            "center",
                                            null,
                                            r.a.createElement(
                                                "strong",
                                                null,
                                                "Cr\xe9ditos (",
                                                e.creditos.length,
                                                ") "
                                            )
                                        )
                                    )
                                ),
                                e.creditos.map(function (e) {
                                    return r.a.createElement(
                                        Ue.a,
                                        { key: "rptF" + e.idControl },
                                        r.a.createElement(
                                            qe.a,
                                            { component: "th", scope: "row" },
                                            e.cliente
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            e.fecha
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            null === e.observacion
                                                ? "-"
                                                : e.observacion
                                        ),
                                        r.a.createElement(
                                            qe.a,
                                            { align: "right" },
                                            "$ ",
                                            e.totalAbono
                                        )
                                    );
                                })
                            )
                        )
                    )
                );
            }
            var lc = t(297),
                cc = Object(u.a)(function (e) {
                    return {
                        backdrop: {
                            zIndex: e.zIndex.drawer + 1,
                            color: "#fff",
                        },
                        button: { margin: e.spacing(1) },
                        table: { minWidth: 650 },
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        textFieldFecha: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(5),
                            marginBottom: e.spacing(2),
                            width: "25ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                }),
                oc = function () {
                    var e = r.a.useState(!1),
                        a = Object(h.a)(e, 2),
                        t = a[0],
                        l = a[1],
                        c = Object(n.useContext)(Kl).getReporteVentasDiaras,
                        o = new Date(),
                        i = Object(n.useState)(zt.a.format(o, "YYYY-MM-DD")),
                        s = Object(h.a)(i, 2),
                        u = s[0],
                        m = s[1],
                        d = Object(n.useState)(zt.a.format(o, "YYYY-MM-DD")),
                        p = Object(h.a)(d, 2),
                        g = p[0],
                        b = p[1],
                        f = cc(),
                        E = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        l(!t),
                                                        (e.next = 3),
                                                        c(u, g)
                                                    );
                                                case 3:
                                                    l(!1);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(_e.a, {
                            id: "date",
                            label: "Desde",
                            type: "date",
                            onChange: function (e) {
                                return m(e.target.value);
                            },
                            defaultValue: u,
                            className: f.textFieldFecha,
                            InputLabelProps: { shrink: !0 },
                        }),
                        r.a.createElement(_e.a, {
                            id: "date",
                            label: "Hasta",
                            type: "date",
                            onChange: function (e) {
                                return b(e.target.value);
                            },
                            defaultValue: g,
                            className: f.textFieldFecha,
                            InputLabelProps: { shrink: !0 },
                        }),
                        r.a.createElement(
                            Y.a,
                            {
                                variant: "contained",
                                color: "primary",
                                className: f.button,
                                loading: !0,
                                onClick: E,
                            },
                            "Cargar"
                        ),
                        r.a.createElement(
                            lc.a,
                            {
                                className: f.backdrop,
                                open: t,
                                onClick: function () {
                                    l(!1);
                                },
                            },
                            r.a.createElement(va.a, { color: "inherit" })
                        )
                    );
                },
                ic = function () {
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(oc, null),
                        r.a.createElement(Hl, { ComponentToPrint: rc }),
                        r.a.createElement(rc, null)
                    );
                },
                sc = function (e) {
                    var a = e.title,
                        t = void 0 === a ? "Reporte de ventas" : a,
                        n = new Date();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(
                            "center",
                            null,
                            r.a.createElement("h1", null, " ", t)
                        ),
                        r.a.createElement("strong", null, "Fecha Reporte"),
                        ": ",
                        zt.a.format(n, "YYYY-MM-DD"),
                        r.a.createElement(
                            "div",
                            null,
                            r.a.createElement("strong", null, "Generado por: "),
                            " ",
                            localStorage.getItem("nombres")
                        )
                    );
                },
                uc = Object(u.a)(function (e) {
                    return {
                        table: { minWidth: 350 },
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        textFieldFecha: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(5),
                            marginBottom: e.spacing(2),
                            width: "25ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                });
            function mc() {
                var e,
                    a,
                    t = Object(n.useContext)(Kl).ingresosXepleado,
                    l = uc(),
                    c = {
                        labels:
                            null === t ||
                            void 0 === t ||
                            null === (e = t.grafico) ||
                            void 0 === e
                                ? void 0
                                : e.labels,
                        series:
                            null === t ||
                            void 0 === t ||
                            null === (a = t.grafico) ||
                            void 0 === a
                                ? void 0
                                : a.series,
                        colors: ["#d70206", "#dda458", "#6188e2"],
                    };
                return r.a.createElement(
                    r.a.Fragment,
                    null,
                    r.a.createElement(sc, { title: "Ingresos por Empleados" }),
                    r.a.createElement(
                        "h3",
                        null,
                        "Total Ventas $ ",
                        t.total_ventas
                    ),
                    r.a.createElement(
                        fe.a,
                        { container: !0, spacing: 3 },
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 7 },
                            r.a.createElement(
                                Dn.a,
                                { component: Bt.a },
                                r.a.createElement(
                                    ze.a,
                                    {
                                        className: l.table,
                                        size: "small",
                                        "aria-label": "a dense table",
                                    },
                                    r.a.createElement(
                                        We.a,
                                        null,
                                        r.a.createElement(
                                            Ue.a,
                                            null,
                                            r.a.createElement(
                                                qe.a,
                                                null,
                                                "Usuario"
                                            ),
                                            r.a.createElement(
                                                qe.a,
                                                { align: "right" },
                                                "N\xb0 Ingresos"
                                            ),
                                            r.a.createElement(
                                                qe.a,
                                                { align: "right" },
                                                "Total Vendido"
                                            )
                                        )
                                    ),
                                    r.a.createElement(
                                        $e.a,
                                        null,
                                        t.ventasEmpleados.map(function (e, a) {
                                            return r.a.createElement(
                                                Ue.a,
                                                { key: "rptFs" + a },
                                                r.a.createElement(
                                                    qe.a,
                                                    {
                                                        component: "th",
                                                        scope: "row",
                                                    },
                                                    e.usuario
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    { align: "right" },
                                                    e.cantidad_ordenes
                                                ),
                                                r.a.createElement(
                                                    qe.a,
                                                    { align: "right" },
                                                    "$ ",
                                                    e.total_venta
                                                )
                                            );
                                        })
                                    )
                                )
                            )
                        ),
                        r.a.createElement(
                            fe.a,
                            { item: !0, xs: 5 },
                            r.a.createElement(
                                "center",
                                null,
                                r.a.createElement(ac.a, {
                                    data: c,
                                    options: {
                                        width: "260px",
                                        height: "260px",
                                        donut: !1,
                                    },
                                    type: "Pie",
                                })
                            )
                        )
                    )
                );
            }
            var dc = Object(u.a)(function (e) {
                    return {
                        backdrop: {
                            zIndex: e.zIndex.drawer + 1,
                            color: "#fff",
                        },
                        button: { margin: e.spacing(1) },
                        table: { minWidth: 650 },
                        root: { display: "flex", flexWrap: "wrap" },
                        textField1: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "36ch",
                        },
                        textField: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                            width: "25ch",
                        },
                        textFieldFecha: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(5),
                            marginBottom: e.spacing(2),
                            width: "25ch",
                        },
                        btn: {
                            marginLeft: e.spacing(1),
                            marginRight: e.spacing(1),
                        },
                    };
                }),
                pc = function () {
                    var e = r.a.useState(!1),
                        a = Object(h.a)(e, 2),
                        t = a[0],
                        l = a[1],
                        c = Object(n.useContext)(
                            Kl
                        ).getReporteIngresosXempleado,
                        o = new Date(),
                        i = Object(n.useState)(zt.a.format(o, "YYYY-MM-DD")),
                        s = Object(h.a)(i, 2),
                        u = s[0],
                        m = s[1],
                        d = Object(n.useState)(zt.a.format(o, "YYYY-MM-DD")),
                        p = Object(h.a)(d, 2),
                        g = p[0],
                        b = p[1],
                        f = dc(),
                        E = (function () {
                            var e = Object(j.a)(
                                O.a.mark(function e() {
                                    return O.a.wrap(function (e) {
                                        for (;;)
                                            switch ((e.prev = e.next)) {
                                                case 0:
                                                    return (
                                                        l(!t),
                                                        (e.next = 3),
                                                        c(u, g)
                                                    );
                                                case 3:
                                                    l(!1);
                                                case 4:
                                                case "end":
                                                    return e.stop();
                                            }
                                    }, e);
                                })
                            );
                            return function () {
                                return e.apply(this, arguments);
                            };
                        })();
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(_e.a, {
                            id: "date",
                            label: "Desde",
                            type: "date",
                            onChange: function (e) {
                                return m(e.target.value);
                            },
                            defaultValue: u,
                            className: f.textFieldFecha,
                            InputLabelProps: { shrink: !0 },
                        }),
                        r.a.createElement(_e.a, {
                            id: "date",
                            label: "Hasta",
                            type: "date",
                            onChange: function (e) {
                                return b(e.target.value);
                            },
                            defaultValue: g,
                            className: f.textFieldFecha,
                            InputLabelProps: { shrink: !0 },
                        }),
                        r.a.createElement(
                            Y.a,
                            {
                                variant: "contained",
                                color: "primary",
                                className: f.button,
                                loading: !0,
                                onClick: E,
                            },
                            "Cargar"
                        ),
                        r.a.createElement(
                            lc.a,
                            {
                                className: f.backdrop,
                                open: t,
                                onClick: function () {
                                    l(!1);
                                },
                            },
                            r.a.createElement(va.a, { color: "inherit" })
                        )
                    );
                },
                gc = function () {
                    return r.a.createElement(
                        r.a.Fragment,
                        null,
                        r.a.createElement(pc, null),
                        r.a.createElement(Hl, { ComponentToPrint: mc }),
                        r.a.createElement(mc, null)
                    );
                };
            function bc(e) {
                var a = e.children,
                    t = e.value,
                    n = e.index,
                    l = Object(U.a)(e, ["children", "value", "index"]);
                return r.a.createElement(
                    "div",
                    Object.assign(
                        {
                            role: "tabpanel",
                            hidden: t !== n,
                            id: "vertical-tabpanel-".concat(n),
                            "aria-labelledby": "vertical-tab-".concat(n),
                        },
                        l
                    ),
                    t === n &&
                        r.a.createElement(
                            I.a,
                            { p: 3 },
                            r.a.createElement(T.a, null, a)
                        )
                );
            }
            function fc(e) {
                return {
                    id: "vertical-tab-".concat(e),
                    "aria-controls": "vertical-tabpanel-".concat(e),
                };
            }
            var Ec = Object(u.a)(function (e) {
                return {
                    root: {
                        flexGrow: 1,
                        backgroundColor: e.palette.background.paper,
                        display: "flex",
                        height: "100%",
                    },
                    tabs: {
                        borderRight: "1px solid ".concat(e.palette.divider),
                        right: "0",
                    },
                };
            });
            function hc() {
                var e = Ec(),
                    a = r.a.useState(0),
                    t = Object(h.a)(a, 2),
                    n = t[0],
                    l = t[1];
                return r.a.createElement(
                    Ql,
                    null,
                    r.a.createElement(
                        "div",
                        { className: e.root },
                        r.a.createElement(
                            Ml.a,
                            {
                                orientation: "vertical",
                                variant: "scrollable",
                                value: n,
                                onChange: function (e, a) {
                                    l(a);
                                },
                                "aria-label": "Vertical tabs example",
                                className: e.tabs,
                            },
                            r.a.createElement(
                                Vl.a,
                                Object.assign(
                                    { align: "left", label: "Ventas  diarias" },
                                    fc(0)
                                )
                            ),
                            r.a.createElement(
                                Vl.a,
                                Object.assign(
                                    { label: "Ingresos por empleado" },
                                    fc(1)
                                )
                            )
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 0 },
                            r.a.createElement(ic, null)
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 1 },
                            r.a.createElement(gc, null)
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 2 },
                            "Item Three"
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 3 },
                            "Item Four"
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 4 },
                            "Item Five"
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 5 },
                            "Item Six"
                        ),
                        r.a.createElement(
                            bc,
                            { value: n, index: 6 },
                            "Item Seven"
                        )
                    )
                );
            }
            var vc = [
                    {
                        path: "app",
                        element: r.a.createElement(ue, null),
                        children: [
                            {
                                path: "account",
                                element: r.a.createElement(Le, null),
                            },
                            {
                                path: "puntoventa",
                                element: r.a.createElement(Bn, null),
                            },
                            {
                                path: "customers",
                                element: r.a.createElement(Pa, null),
                            },
                            {
                                path: "dashboard",
                                element: r.a.createElement(Za, null),
                            },
                            {
                                path: "products",
                                element: r.a.createElement(yt, null),
                            },
                            {
                                path: "settings",
                                element: r.a.createElement(Rt, null),
                            },
                            {
                                path: "creditos",
                                element: r.a.createElement(br, null),
                            },
                            {
                                path: "ingreso",
                                element: r.a.createElement(Cl, null),
                            },
                            {
                                path: "facturas",
                                element: r.a.createElement(Dl, null),
                            },
                            {
                                path: "pedidos",
                                element: r.a.createElement(Ll, null),
                            },
                            {
                                path: "reportes",
                                element: r.a.createElement(hc, null),
                            },
                            {
                                path: "*",
                                element: r.a.createElement(i.a, { to: "/404" }),
                            },
                        ],
                    },
                    {
                        path: "/",
                        element: r.a.createElement(ge, null),
                        children: [
                            {
                                path: "login",
                                element: r.a.createElement(tt, null),
                            },
                            {
                                path: "register",
                                element: r.a.createElement(Nt, null),
                            },
                            {
                                path: "404",
                                element: r.a.createElement(rt, null),
                            },
                            {
                                path: "/",
                                element: r.a.createElement(i.a, {
                                    to: "/login",
                                }),
                            },
                            {
                                path: "*",
                                element: r.a.createElement(i.a, { to: "/404" }),
                            },
                        ],
                    },
                ],
                xc = function () {
                    var e = Object(i.i)(vc),
                        a = Object(i.g)();
                    if (null !== localStorage.getItem("login")) {
                        var t = new Date(),
                            n =
                                t.getHours() +
                                ":" +
                                t.getMinutes() +
                                ":" +
                                t.getSeconds(),
                            l = localStorage.getItem("hora_inicio"),
                            c = localStorage.getItem("hora_fin");
                        (n >= l && n <= c) || a("/login", { replace: !0 });
                    }
                    return r.a.createElement(
                        s.a,
                        { theme: E },
                        r.a.createElement(p, null),
                        e
                    );
                };
            c.a.render(
                r.a.createElement(
                    o.a,
                    null,
                    r.a.createElement(
                        N,
                        null,
                        r.a.createElement(
                            Ea,
                            null,
                            r.a.createElement(
                                hr,
                                null,
                                r.a.createElement(
                                    gt,
                                    null,
                                    r.a.createElement(
                                        la,
                                        null,
                                        r.a.createElement(
                                            Nr,
                                            null,
                                            r.a.createElement(
                                                Vt,
                                                null,
                                                r.a.createElement(
                                                    Gt,
                                                    null,
                                                    r.a.createElement(xc, null)
                                                )
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                ),
                document.getElementById("root")
            ),
                "serviceWorker" in navigator &&
                    navigator.serviceWorker.ready.then(function (e) {
                        e.unregister();
                    });
        },
    },
    [[614, 1, 2]],
]);
//# sourceMappingURL=main.b20c478d.chunk.js.map
